<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Access;

class Role extends Model
{
    protected $table = 'roles';

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function access()
    {
        return $this->belongsToMany(Access::class);
    }
}
