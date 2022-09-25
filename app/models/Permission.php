<?php 

require_once "./app/models/BaseModel.php";
require_once "./app/models/PermissionGroup.php";

class Permission extends BaseModel
{
    static protected $table = "permissions";

    static protected $attributes = [
        'id',
        'name',
        'key',
        'permission_group_id',
        'created_at',
        'updated_at',
    ];

    public function permissionGroup() 
    {
        return $this->belongsTo(PermissionGroup::class, "permission_group_id", "id");
    }
}