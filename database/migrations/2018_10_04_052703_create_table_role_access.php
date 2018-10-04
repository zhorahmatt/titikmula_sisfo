<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoleAccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table role
        Schema::create('roles', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nama_roles')->unique();
            $table->string('keterangan')->nullable();
            $table->boolean('status')->default(true);
        });

        //create table access
        Schema::create('access', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nama_access');
            $table->string('keterangan')->nullable();
            $table->boolean('status')->default(true);
        });

        //create table relation on role dan access
        Schema::create('role_access', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('access_id')->unsigned();
        });

        //create table relation on user dan role
        Schema::create('role_user', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('access');
        Schema::dropIfExists('role_access');
        Schema::dropIfExists('role_user');
    }
}
