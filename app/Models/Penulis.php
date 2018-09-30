<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = "master_penulis";

    //relasi penulis dengan buku
    public function toBook()
    {
        return $this->belongsTo('App\Models\Buku', 'master_buku', 'id','id');
    }
}
