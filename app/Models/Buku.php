<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'master_buku';

    //relasi ke penulis
    public function toPenulis()
    {
        return $this->hasOne('App\Models\Penulis', 'id', 'penulis');
    }

    //relasi ke penerbit
    public function toPenerbit()
    {
        return $this->hasOne('App\Models\Penerbit', 'id', 'penerbit');
    }

    //relasi ke kategori
    public function toKategori()
    {
        return $this->hasMany('App\Models\Kategori', 'id', 'kategori');
    }
}
