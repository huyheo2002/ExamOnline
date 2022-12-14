<?php 

require_once "./app/models/BaseModel.php";
require_once "./app/models/Permission.php";

class PermissionGroup extends BaseModel
{
    static protected $table = "permission_groups";

    static protected $attributes = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function permissions() 
    {
        return $this->hasMany(Permission::class, 'id', 'permission_group_id');
    }
}