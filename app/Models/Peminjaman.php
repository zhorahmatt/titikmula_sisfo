<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    public function buku()
    {
        return $this->belongsTo('App\Models\Buku');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Models\User');
    }
}
