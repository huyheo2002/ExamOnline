<?php 

require_once "./app/models/BaseModel.php";
require_once "./app/models/Permission.php";
require_once "./app/models/User.php";

class Role extends BaseModel
{
    static protected $table = "roles";

    static protected $attributes = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function permissions() 
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions', 'role_id', 'permission_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'role_id');
    }
}