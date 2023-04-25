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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->integer('type_person_id')->unsigned();
            $table->foreign('type_person_id')->references('id')->on('type_persons');
            $table->string('name', '150');
            $table->string('surname', '200');
            $table->date('date_birth');
            $table->string('gender', '1');
            $table->string('cpf', '11');
            $table->string('rg', '7');
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('persons');
    }
};
