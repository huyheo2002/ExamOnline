<?php
require_once "./app/controllers/admin/BaseController.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class ExamController extends BaseController
{
    public function index()
    {
        Gate::authorize('viewAny-role');

        $sql = "SELECT * FROM `roles`";
        $roles = DB::execute($sql);

        $sql = "SELECT permissions.* FROM roles_permissions, permissions WHERE (roles_permissions.permission_id = permissions.id and roles_permissions.role_id = :id)";
        for ($i = 0; $i < count($roles); $i++) {
            $roles[$i]["permissions"] = array_merge(array(), DB::execute($sql, ["id" => $roles[$i]["id"]]));  
        }
        
        include ("./resources/view/admin/role/index.php");        
    }

    public function create()
    {
        Gate::authorize('create-role');

        $sql = "SELECT * FROM `permission_groups`";
        $permissionGroups = DB::execute($sql);

        $sql = "SELECT * FROM `permissions` WHERE `permission_group_id` = :id";
        for ($i = 0; $i < count($permissionGroups); $i++) {
            $permissionGroups[$i]["permissions"] = array_merge(array(), DB::execute($sql, ["id" => $permissionGroups[$i]["id"]]));          
        }

        include ("./resources/view/admin/role/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-role');

        $sql = "INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (null, :name, null, null)";
        DB::execute($sql, 
        [
            "name" => $formData["name"]
        ]);
        $sql = "SELECT LAST_INSERT_ID() FROM `roles`"; 
        $lastInsertId = DB::execute($sql)[0]["LAST_INSERT_ID()"];
        $sql = "INSERT INTO `roles_permissions` (`permission_id`, `role_id`, `created_at`, `updated_at`) VALUES (:permission_id, :role_id, null, null)";

        foreach($formData["permission_ids"] as $permission_id) {
            DB::execute($sql, [
                "permission_id" => $permission_id,
                "role_id" => $lastInsertId
            ]);
        }

        Route::redirect(Route::path("role.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-role');

        $sql = "SELECT * FROM `roles` WHERE (`id` = :id)";
        $role = DB::execute($sql, ["id" => $id])[0];

        $sql = "SELECT permissions.id FROM roles_permissions, permissions WHERE (roles_permissions.permission_id = permissions.id and roles_permissions.role_id = :id)";
        $role["permissions"] = array_merge(array(), DB::execute($sql, ["id" => $role["id"]])); 
        
        $sql = "SELECT * FROM `permission_groups`";
        $permissionGroups = DB::execute($sql);

        $sql = "SELECT * FROM `permissions` WHERE `permission_group_id` = :id";
        for ($i = 0; $i < count($permissionGroups); $i++) {
            $permissionGroups[$i]["permissions"] = array_merge(array(), DB::execute($sql, ["id" => $permissionGroups[$i]["id"]]));          
        }
        
        include ("./resources/view/admin/role/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-role');

        $sql = "SELECT * FROM `roles` WHERE (`id` = :id)";
        $role = DB::execute($sql, ["id" => $id])[0];

        $sql = "SELECT permissions.id FROM roles_permissions, permissions WHERE (roles_permissions.permission_id = permissions.id and roles_permissions.role_id = :id)";
        $role["permissions"] = array_merge(array(), DB::execute($sql, ["id" => $role["id"]])); 
        
        $sql = "SELECT * FROM `permission_groups`";
        $permissionGroups = DB::execute($sql);

        $sql = "SELECT * FROM `permissions` WHERE `permission_group_id` = :id";
        for ($i = 0; $i < count($permissionGroups); $i++) {
            $permissionGroups[$i]["permissions"] = array_merge(array(), DB::execute($sql, ["id" => $permissionGroups[$i]["id"]]));          
        }

        include ("./resources/view/admin/role/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-role');

        $sql = "UPDATE `roles` SET `name` = :name WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id, "name" => $formData["name"]]);

        $sql = "DELETE FROM `roles_permissions` WHERE (`role_id` = :id)";
        DB::execute($sql, ["id" => $id]);

        $sql = "INSERT INTO `roles_permissions` (`permission_id`, `role_id`, `created_at`, `updated_at`) VALUES (:permission_id, :role_id, null, null)";
        foreach($formData["permission_ids"] as $permission_id) {
            DB::execute($sql, [
                "permission_id" => $permission_id,
                "role_id" => $id
            ]);
        }
        
        Route::redirect(Route::path("role.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-role');

        $sql = "DELETE FROM `roles_permissions` WHERE (`role_id` = :id)";
        DB::execute($sql, ["id" => $id]);
        
        $sql = "DELETE FROM `roles` WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id]);
        Route::redirect(Route::path("role.index"));  
    }

}