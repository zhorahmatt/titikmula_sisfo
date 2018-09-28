<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = "master_penerbit";

    //relasi penulis dengan buku
    public function toBook()
    {
        return $this->belongsTo('App\Models\Buku', 'master_buku', 'id','id');
    }
}
