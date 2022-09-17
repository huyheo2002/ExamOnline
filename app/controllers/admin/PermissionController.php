<?php
require_once "./app/controllers/admin/BaseController.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class PermissionController extends BaseController
{
    public function index()
    {
        $sql = "SELECT * FROM `permissions`";
        $permission = DB::execute($sql);
        // var_dump($permission);
        // die;
        // lấy view
        include ("./resources/view/admin/permission/index.php");
        
    }

    public function create()
    {
        include ("./resources/view/admin/permission/create.php");
    }

    public function store($formData)
    {
        $sql = "INSERT INTO`permissions` (`id`, `name`, `key`, `permisstion_group_id`, `created_at`, `updated_at`) VALUES (null, :name, :key, :permisstion_group_id, null, null)";
        DB::execute($sql, 
        [
            "name" => $formData["name"],
            "key" => $formData["key"],
            "permisstion_group_id" => $formData["permisstion_group_id"]
        ]); 
        Route::redirect(Route::root() . "?page=permission-group.index");       
    }

    public function show($id)
    {
        $sql = "SELECT * FROM `permissions` WHERE (`id` = :id)";
        $permission = DB::execute($sql, ["id" => $id])[0];
        include ("./resources/view/admin/permission/show.php");
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM `permissions` WHERE (`id` = :id)";
        $permission = DB::execute($sql, ["id" => $id])[0];
        include ("./resources/view/admin/permission/edit.php");
    }

    public function update($id, $formData)
    {
        $sql = "UPDATE `permissions` SET `name` = :name WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id, "name" => $formData["name"]]);
        Route::redirect(Route::root() . "?page=permission.index");  
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `permissions` WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id]);
        Route::redirect(Route::root() . "?page=permission.index");  
    }

}