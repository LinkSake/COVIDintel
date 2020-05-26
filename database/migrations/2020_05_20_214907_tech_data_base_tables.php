<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TechDataBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_org', function (Blueprint $table) {
            $table->bigIncrements('id_cat_org');
            $table->string('category');
        });

        Schema::create('organization', function (Blueprint $table) {
            $table->bigIncrements('id_org');
            $table->string('name');
            $table->text('address');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('id_cat_org');
            $table->foreign('id_cat_org')
                ->references('id_cat_org')
                ->on('cat_org');
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')
                ->references('id_user')
                ->on('users');
            $table->timestamps();
        });

        Schema::create('users_organizations', function (Blueprint $table) {
            $table->bigIncrements('id_usr_org');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users');
            $table->unsignedBigInteger('id_org');
            $table->foreign('id_org')
                ->references('id_org')
                ->on('organization');
            $table->timestamps();
        });

        Schema::create('os_pc', function (Blueprint $table) {
            $table->bigIncrements('id_os_pc');
            $table->string('os');
        });

        Schema::create('os_mobile', function (Blueprint $table) {
            $table->bigIncrements('id_os_mobile');
            $table->string('os');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_os_pc')
            ->nullable();
            $table->foreign('id_os_pc')
                ->references('id_os_pc')
                ->on('os_pc');
            $table->unsignedBigInteger('id_os_mobile')
            ->nullable();
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
        Schema::dropIfExists('users_organization');
        Schema::dropIfExists('organization');
        Schema::dropIfExists('cat_org');
    }
}
