<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'Tidak ada akses untuk ini');
        }

        return $this->hasRole($roles) || abort(401, 'Tidak ada akses untuk ini');
    }

    public function hasAnyRole($role)
    {
        return null !== $this->roles()->whereIn('nama_roles', $role)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('nama_roles', $role)->first();
    }
}
