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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->string('status', '1')->default(1);
            $table->string('user', '150')->nullable();
            $table->string('password')->nullable();
            $table->date('registration_user_at')->nullable();
            $table->string('status_user','1')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
