<?php
require_once "./app/controllers/ResourceController.php";
require_once "./app/DB.php";
require_once "./app/Route.php";
require_once "./app/Gate.php";

class PermissionGroupController extends ResourceController
{
    public function index()
    {
        Gate::authorize('viewAny-permission-group');

        $sql = "SELECT * FROM `permission_groups`";
        $permissionGroups = DB::execute($sql);
        
        include ("./resources/view/admin/permission_group/index.php");
    }

    public function create()
    {
        Gate::authorize('create-permission-group');
        
        include ("./resources/view/admin/permission_group/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-permission-group');
        
        $sql = "INSERT INTO`permission_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES (null, :name, null, null)";
        DB::execute($sql, ["name" => $formData["name"]]); 
        
        Route::redirect(Route::path("permission-group.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-permission-group');

        $sql = "SELECT * FROM `permission_groups` WHERE (`id` = :id)";
        $permissionGroup = DB::execute($sql, ["id" => $id])[0];
        
        include ("./resources/view/admin/permission_group/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-permission-group');
        
        $sql = "SELECT * FROM `permission_groups` WHERE (`id` = :id)";
        $permissionGroup = DB::execute($sql, ["id" => $id])[0];
        
        include ("./resources/view/admin/permission_group/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-permission-group');
        
        $sql = "UPDATE `permission_groups` SET `name` = :name WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id, "name" => $formData["name"]]);
        
        Route::redirect(Route::path("permission-group.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-permission-group');
        
        $sql = "DELETE FROM `permission_groups` WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id]);
        
        Route::redirect(Route::path("permission-group.index"));  
    }

}