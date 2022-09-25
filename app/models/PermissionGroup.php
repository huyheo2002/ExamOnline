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
        if (!isset($this->id)) {
            return [];
        }
        
        return Permission::allWhere("permission_group_id", "=", $this->id);
    }
}