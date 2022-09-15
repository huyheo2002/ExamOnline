<?php
require_once "./app/controllers/admin/BaseController.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class PermissionGroupController extends BaseController
{
    public function index()
    {
        $sql = "SELECT * FROM `permission_groups`";
        $permissionGroups = DB::execute($sql);
        // var_dump($permissionGroups);
        // die;
        // lấy view
        include ("./resources/view/admin/permission_group/index.php");
        
    }

    public function create()
    {
        include ("./resources/view/admin/permission_group/create.php");
    }

    public function store($formData)
    {
        $sql = "INSERT INTO`permission_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES (null, :name, null, null)";
        DB::execute($sql, ["name" => $formData["name"]]); 
        Route::redirect(Route::root() . "?page=permission-group.index");       
    }

    public function show($id)
    {
        $sql = "SELECT * FROM `permission_groups` WHERE (`id` = :id)";
        $permissionGroup = DB::execute($sql, ["id" => $id])[0];
        include ("./resources/view/admin/permission_group/show.php");
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM `permission_groups` WHERE (`id` = :id)";
        $permissionGroup = DB::execute($sql, ["id" => $id])[0];
        include ("./resources/view/admin/permission_group/edit.php");
    }

    public function update($id, $formData)
    {
        $sql = "UPDATE `permission_groups` SET `name` = :name WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id, "name" => $formData["name"]]);
        Route::redirect(Route::root() . "?page=permission-group.index");  
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `permission_groups` WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id]);
        Route::redirect(Route::root() . "?page=permission-group.index");  
    }

}