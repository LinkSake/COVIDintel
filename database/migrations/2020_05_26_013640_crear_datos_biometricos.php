<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearDatosBiometricos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_biometricos',function(Blueprint $table){
            $table->bigIncrements('id_dat_bio');
            $table->boolean('temp');
            $table->boolean('tos');
            $table->string('obs');
            $table->dateTime('fecha');
        });

        Schema::table('datos_biometricos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usr_org');
            $table->foreign('id_usr_org')->references('id_usr_org')->on('users_organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datos_biometricos', function (Blueprint $table) {
            $table->dropIfExists('datos_biometricos');
        });
    }
}
