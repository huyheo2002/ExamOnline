<?php
require_once "./app/controllers/ResourceController.php";
require_once "./app/models/Permission.php";
require_once "./app/models/PermissionGroup.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class PermissionController extends ResourceController
{
    public function index()
    {
        Gate::authorize('viewAny-permission');

        $permissions = Permission::all();
        
        return include ("./resources/view/admin/permission/index.php");
    }

    public function create()
    {
        Gate::authorize('create-permission');

        $permissionGroups = PermissionGroup::all();

        return include ("./resources/view/admin/permission/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-permission');
        
        Permission::create([
            "name" => $formData["name"],
            "key" => $formData["key"],
            "permission_group_id" => $formData["permission_group_id"]
        ]);         

        return Route::redirect(Route::path("permission.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-permission');

        $permission = Permission::find($id);
        
        return include ("./resources/view/admin/permission/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-permission');

        $permission = Permission::find($id);
        $permissionGroups = PermissionGroup::all();

        return include ("./resources/view/admin/permission/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-permission');

        Permission::update([
            "name" => $formData["name"],
            "key" => $formData["key"],
            "permission_group_id" => $formData["permission_group_id"],
        ], $id);
        
        return Route::redirect(Route::path("permission.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-permission');

        Permission::destroy($id);
        
        return Route::redirect(Route::path("permission.index"));  
    }

}