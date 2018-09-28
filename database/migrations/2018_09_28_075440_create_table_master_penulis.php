<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterPenulis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_penulis', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nama_penulis')->unique();
            $table->string('alamat')->nullable();
            $table->string('facebook_penulis')->nullable();
            $table->string('instagram_penulis')->nullable();
            $table->string('twitter_penulis')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('master_penulis');
    }
}
