<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Access extends Model
{
    protected $table = 'acceess';

    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
