<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('ds_cpf_cnpj',15);
            $table->string('ds_email',100);
            $table->string('ds_name',100);
            $table->boolean('st_active');
            $table->string('ds_refresh_token');
            $table->timestamp('dt_last_update');
            $table->timestamp('dt_created');
            $table->string('ds_occupation',100);
            $table->boolean('st_retention');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
