<?php
require_once "./app/controllers/admin/BaseController.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class PermissionController extends BaseController
{
    public function index()
    {
        $sql = "SELECT * FROM `permissions`";
        $permissions = DB::execute($sql);
        // var_dump($permission);
        // die;
        // lấy view
        include ("./resources/view/admin/permission/index.php");
        
    }

    public function create()
    {
        $sql = "SELECT * FROM `permission_groups`";
        $permissionGroups = DB::execute($sql);
        include ("./resources/view/admin/permission/create.php");
    }

    public function store($formData)
    {
        // var_dump($formData);
        // die;
        $sql = "INSERT INTO `permissions` (`id`, `name`, `key`, `permission_group_id`, `created_at`, `updated_at`) VALUES (null, :name, :key, :permission_group_id, null, null)";
        $test = DB::execute($sql, 
        [
            "name" => $formData["name"],
            "key" => $formData["key"],
            "permission_group_id" => $formData["permission_group_id"]
        ]);         
        Route::redirect(Route::root() . "?page=permission.index");       
    }

    public function show($id)
    {
        $sql = "SELECT * FROM `permissions` WHERE (`id` = :id)";
        $permission = DB::execute($sql, ["id" => $id])[0];
        
        $sql = "SELECT * FROM `permissions` WHERE (`id` = :id)";
        $permission["permission_group"] = DB::execute($sql, ["id" => $permission["permission_group_id"]])[0];
        include ("./resources/view/admin/permission/show.php");
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM `permissions` WHERE (`id` = :id)";
        $permission = DB::execute($sql, ["id" => $id])[0];

        $sql = "SELECT * FROM `permission_groups`";
        $permissionGroups = DB::execute($sql);
        include ("./resources/view/admin/permission/edit.php");
    }

    public function update($id, $formData)
    {
        $sql = "UPDATE `permissions` SET `name` = :name, `key` = :key, `permission_group_id` = :permission_group_id WHERE (`id` = :id)";
        DB::execute($sql, [
            "id" => $id,
            "name" => $formData["name"],
            "key" => $formData["key"],
            "permission_group_id" => $formData["permission_group_id"]
        ]);
        Route::redirect(Route::root() . "?page=permission.index");  
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `permissions` WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id]);
        Route::redirect(Route::root() . "?page=permission.index");  
    }

}