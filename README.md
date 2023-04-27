# Mobile-Estacio-Api
Esta é uma API designada para consumo de informações

# Pre-Requisitos
Docker / Docker-compose 

# Comandos básicos para inicializar o container
* docker-compose up -d || docker-compose  build

# Comandos básicos para encerrar o container
* docker-compose down

# Comandos básicos para inicializar o projeto
* php artisan migrate --seed
* php artisan serve

# Acesso ao projeto de maneira authenticada
* name: root, email: root@gmail.com, password: 123456

# rotas Padrão da api
* /api/login -> rota de autenticação
* /api/persons -> essa rota comporta todas as requisições de um crud
