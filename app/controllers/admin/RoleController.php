<?php
require_once "./app/controllers/ResourceController.php";
require_once "./app/models/Role.php";
require_once "./app/models/PermissionGroup.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class RoleController extends ResourceController
{
    public function index()
    {
        Gate::authorize('viewAny-role');

        $roles = Role::all();
        
        return include ("./resources/view/admin/role/index.php");        
    }

    public function create()
    {
        Gate::authorize('create-role');

        $permissionGroups = PermissionGroup::all();

        return include ("./resources/view/admin/role/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-role');

        $role = Role::create([
            "name" => $formData["name"],
        ]);
        if (!empty($role)) {
            $role->sync("roles_permissions", "role_id", "permission_id", $formData["permission_ids"]);
        } 

        return Route::redirect(Route::path("role.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-role');

        $role = Role::find($id);
        $permissionGroups = PermissionGroup::all();
        
        return include ("./resources/view/admin/role/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-role');

        $role = Role::find($id);
        $permissionGroups = PermissionGroup::all();

        return include ("./resources/view/admin/role/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-role');

        $role = Role::update([
            "name" => $formData["name"],
        ], $id);
        if (!empty($role)) {
            $role->sync("roles_permissions", "role_id", "permission_id", $formData["permission_ids"]);
        }
        
        return Route::redirect(Route::path("role.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-role');

        $role = Role::find($id);
        if (!empty($role)) {
            $role->sync("roles_permissions", "role_id", "permission_id", []);
        }
        Role::destroy($id);

        return Route::redirect(Route::path("role.index"));  
    }

}