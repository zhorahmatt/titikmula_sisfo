<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table peminjaman
        Schema::create('peminjaman', function(Blueprint $table) {
            $table->increments('id');
            $table->string('kode_peminjaman')->unique();
            $table->integer('kode_buku')->unsigned();
            $table->integer('kode_member')->unsigned();
            $table->integer('petugas')->unsigned();
            $table->string('keterangan')->nullable();
            $table->date('waktu_mulai_peminjaman')->nullable();
            $table->date('waktu_selesai_peminjaman')->nullable();
            $table->integer('kali_perpanjangan')->default(0)->nullable();
            $table->boolean('status_pinjaman')->default(true); // 0 dipinjam , 1 dikembalikan
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
        Schema::dropIfExists('peminjaman');
    }
}
