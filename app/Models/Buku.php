<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'master_buku';

    //relasi ke penulis
    public function toPenulis()
    {
        return $this->hasOne('App\Models\Penulis', 'master_penulis', 'id', 'id');
    }

    //relasi ke penerbit
    public function toPenerbit()
    {
        return $this->hasOne('App\Models\Penerbit', 'master_penerbit', 'id', 'id');
    }

    //relasi ke kategori
    public function toKategori()
    {
        return $this->hasMany('App\Models\Kategori', 'master_penulis', 'id', 'id');
    }
}
