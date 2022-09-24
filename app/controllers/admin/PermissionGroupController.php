<?php
require_once "./app/controllers/ResourceController.php";
require_once "./app/models/PermissionGroup.php";
require_once "./app/Route.php";
require_once "./app/Gate.php";

class PermissionGroupController extends ResourceController
{
    public function index()
    {
        Gate::authorize('viewAny-permission-group');

        $permissionGroups = PermissionGroup::all();
        
        return include ("./resources/view/admin/permission_group/index.php");
    }

    public function create()
    {
        Gate::authorize('create-permission-group');
        
        return include ("./resources/view/admin/permission_group/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-permission-group');
        
        PermissionGroup::create([
            'name' => $formData['name'],
        ]);
        
        return Route::redirect(Route::path("permission-group.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-permission-group');

        $permissionGroup = PermissionGroup::find($id);
        
        return include ("./resources/view/admin/permission_group/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-permission-group');
        
        $permissionGroup = PermissionGroup::find($id);
        
        include ("./resources/view/admin/permission_group/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-permission-group');
        
        PermissionGroup::update([
            'name' => $formData['name'],
        ], $id);
        
        Route::redirect(Route::path("permission-group.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-permission-group');
        
        PermissionGroup::destroy($id);
        
        Route::redirect(Route::path("permission-group.index"));  
    }

}