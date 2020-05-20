<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_org', function (Blueprint $table) {
            $table->bigIncrements('id_cat_org');
            $table->string('category')->unique();
        });

        Schema::create('organization', function (Blueprint $table) {
            $table->bigIncrements('id_org');
            $table->string('name');
            $table->unsignedBigInteger('id_cat_org');
            $table->foreign('id_cat_org')
                ->references('id_cat_org')
                ->on('category_org');
            $table->text('address');
            $table->string('email');
            $table->string('telefono');
            $table->timestamps();
        });

        Schema::create('os_pc', function (Blueprint $table) {
            $table->bigIncrements('id_os_pc');
            $table->string('os')->unique();
        });

        Schema::create('os_mobile', function (Blueprint $table) {
            $table->bigIncrements('id_os_mobile');
            $table->string('os')->unique();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_os_pc');
            $table->foreign('id_os_pc')
                ->references('id_os_pc')
                ->on('os_pc');
            $table->unsignedBigInteger('id_os_mobile');
            $table->foreign('id_os_mobile')
                ->references('id_os_mobile')
                ->on('os_mobile');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_os_mobile','id_os_pc']);
        });

        Schema::dropIfExists('os_mobile');
        Schema::dropIfExists('os_pc');
        Schema::dropIfExists('organization');
        Schema::dropIfExists('category_org');
    }
}
