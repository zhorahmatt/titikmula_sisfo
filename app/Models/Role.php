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

    public function authorizeAccess($access)
    {
        if (is_array($access)) {
            return $this->hasAnyAccess($access) || abort(401, 'Tidak ada akses untuk ini');
        }

        return $this->hasAccess($access) || abort(401, 'Tidak ada akses untuk ini');
    }

    public function hasAnyAccess($access)
    {
        return null !== $this->access()->whereIn('nama_access', $access)->first();
    }

    public function hasAccess($access)
    {
        return null !== $this->access()->where('nama_access', $access)->first();
    }

    public function addPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Access::where('nama_access', $permission)->first();
        }
 
        return $this->access()->attach($permission);
    }
 
    public function removePermission($permission)
    {
        if (is_string($permission)) {
            $permission = Access::where('nama_access', $permission)->first();
        }
 
        return $this->access()->detach($permission);
    }
}
