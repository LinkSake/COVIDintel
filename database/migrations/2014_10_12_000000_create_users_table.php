<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('name');
            $table->string('lastname_f');
            $table->string('lastname_m');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('curp');
            $table->string('pc');
            $table->boolean('mobile');
            $table->boolean('internet');
            $table->boolean('mobile_data');
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
}
