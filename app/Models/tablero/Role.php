<?php

namespace App\Models\tablero;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{

    protected $table = 'roles';
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    public $timestamps = false;

        // Usuarios
    public function users()
    {
        return $this->belongsToMany(
            Contravel_user::class,
            'user_roles',
            'role_id',
            'user_id'
        );
    }

    // Permisos
    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class, 'role_id');
    }

    // 🔥 BONUS: obtener permisos con relaciones
    public function permissions()
    {
        return $this->hasManyThrough(
            Permission::class,
            RolePermission::class,
            'role_id',
            'id',
            'id',
            'permission_id'
        );
    }

}
