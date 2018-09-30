<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "master_kategori";

    //relasi penulis dengan buku
    public function toBook()
    {
        return $this->belongsTo('App\Models\Buku', 'master_buku', 'id','id');
    }
}
