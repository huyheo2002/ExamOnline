<?php 

require_once "./app/models/BaseModel.php";

class PermissionGroup extends BaseModel
{
    static protected $table = "permission_groups";

    static protected $attributes = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function permissions($id) 
    {
        $sql = "SELECT `permissions`.* FROM `permissions` WHERE (`permission_group_id` = :id)";

        return DB::execute($sql, [
            'id' => $id,
        ]);
    }
}