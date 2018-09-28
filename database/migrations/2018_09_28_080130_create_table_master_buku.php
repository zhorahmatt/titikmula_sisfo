<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_buku', function(Blueprint $table) {
            $table->increments('id');
            $table->string('judul_buku')->unique();
            $table->integer('penulis')->unsigned()->nullable();
            $table->integer('penerbit')->unsigned()->nullable();
            $table->integer('kategori')->unsigned()->nullable();
            $table->string('jml_halaman')->nullable();
            $table->text('deskripsi');
            $table->boolean('status')->default(true);
            $table->timestamps();

            //add foreign
            $table->foreign('penulis')->references('id')->on('master_penulis')->onDelete('cascade');
            $table->foreign('penerbit')->references('id')->on('master_penerbit')->onDelete('cascade');
            $table->foreign('kategori')->references('id')->on('master_kategori')->onDelete('cascade');
        });       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_buku');
    }
}
