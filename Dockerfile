FROM php:8.2-apache

RUN apt-get update && apt-get install -y git libpq-dev libmcrypt-dev libxml2-dev libtidy-dev libpng-dev \
    freetds-bin freetds-dev freetds-common libct4 libsybdb5 tdsodbc libfreetype6-dev \
    libjpeg62-turbo-dev libldap2-dev zlib1g-dev libzip-dev libc-client-dev libonig-dev curl \
    && ln -s /usr/lib/x86_64-linux-gnu/libsybdb.so /usr/lib/ \
    && apt install --reinstall freetds-dev \
    && docker-php-ext-install intl bcmath mbstring intl gd pgsql pdo pdo_pgsql soap tidy xml zip

ADD .docker/config/timezone.ini /usr/local/etc/php/conf.d/

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm -rf composer-setup.php

RUN a2enmod rewrite && service apache2 restart

EXPOSE 8080

WORKDIR /var/www
