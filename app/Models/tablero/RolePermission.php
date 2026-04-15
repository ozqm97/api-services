<?php

namespace App\Models;

use App\Models\tablero\Area;
use App\Models\tablero\Module;
use App\Models\tablero\Permission;
use App\Models\tablero\Role;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_permissions';

    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'module_id',
        'permission_id',
        'area_id'
    ];

    // 🔗 Relaciones

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}