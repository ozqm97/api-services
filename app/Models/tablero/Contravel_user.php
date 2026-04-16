<?php

namespace App\Models\tablero;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Contravel_user extends Authenticatable
{
    protected $table = 'contravel_users';

    protected $fillable = [
        'user',
        'cifrado',
        'mail',
        'full_name',
        'cve_agencia',
    ];

    public $timestamps = false;

    protected $primaryKey = 'id';

    // 🔗 Relación con agencia
    public function agency()
    {
        return $this->belongsTo(Agencies::class, 'cve_agencia');
    }

    // 🔗 Relación con roles
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'user_roles',
            'user_id',
            'role_id'
        );
    }

    // 🔥 Método clave: verificar permisos
    public function canDo($permission, $module, $area)
    {
        return DB::table('user_roles as ur')
            ->join('role_permissions as rp', 'ur.role_id', '=', 'rp.role_id')
            ->join('modules as m', 'rp.module_id', '=', 'm.id')
            ->join('permissions as p', 'rp.permission_id', '=', 'p.id')
            ->join('areas as a', 'rp.area_id', '=', 'a.id')
            ->where('ur.user_id', $this->id)
            ->where('m.name', $module)
            ->where('p.name', $permission)
            ->where('a.name', $area)
            ->exists();
    }

    public function getFullPermissionTree()
    {
        $this->load(
            'roles.rolePermissions.module',
            'roles.rolePermissions.permission',
            'roles.rolePermissions.area'
        );

        $result = [];

        foreach ($this->roles as $role) {

            foreach ($role->rolePermissions as $rp) {

                $area = $rp->area->slug;
                $module = $rp->module->slug;
                $permission = $rp->permission->slug;
                $roleSlug = $role->slug;

                $result[$area][$module][$roleSlug][] = $permission;
            }
        }

        // 🔥 limpiar duplicados
        foreach ($result as $area => $modules) {
            foreach ($modules as $module => $roles) {
                foreach ($roles as $role => $permissions) {
                    $result[$area][$module][$role] = array_values(array_unique($permissions));
                }
            }
        }

        return $result;
    }
}
