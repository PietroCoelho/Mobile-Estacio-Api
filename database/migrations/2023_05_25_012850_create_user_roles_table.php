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
        Schema::create('tb_user_roles', function (Blueprint $table) {
            $table->id('id_user_roles');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('tb_users');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id_role')->on('tb_roles');
            $table->timestamp('dt_created');
            $table->timestamp('dt_last_update');
            $table->boolean('st_active');
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
        Schema::dropIfExists('user_roles');
    }
};
