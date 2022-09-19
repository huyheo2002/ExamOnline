<?php
require_once "./app/controllers/admin/BaseController.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class UserController extends BaseController
{
    public function index()
    {
        $sql = "SELECT * FROM `users`";
        $users = DB::execute($sql);
        
        $sql = "SELECT * FROM `roles` WHERE (`id` = :id)";        
        
        foreach ($users as $key => $user) {
            $users[$key]["role"] = DB::execute($sql, ["id" => $users[$key]["role_id"]])[0];
            
        }
        
        include ("./resources/view/admin/user/index.php");
        
    }

    public function create()
    {
        include ("./resources/view/admin/user/create.php");
    }

    public function store($formData)
    {
        $sql = "INSERT INTO`users` (`id`, `name`, `key`, `permisstion_group_id`, `created_at`, `updated_at`) VALUES (null, :name, :key, :permisstion_group_id, null, null)";
        DB::execute($sql, 
        [
            "name" => $formData["name"],
            "key" => $formData["key"],
            "permisstion_group_id" => $formData["permisstion_group_id"]
        ]); 
        Route::redirect(Route::root() . "?page=user.index");       
    }

    public function show($id)
    {
        $sql = "SELECT * FROM `users` WHERE (`id` = :id)";
        $user = DB::execute($sql, ["id" => $id])[0];
        include ("./resources/view/admin/user/show.php");
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM `users` WHERE (`id` = :id)";
        $user = DB::execute($sql, ["id" => $id])[0];
        include ("./resources/view/admin/user/edit.php");
    }

    public function update($id, $formData)
    {
        $sql = "UPDATE `users` SET `name` = :name WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id, "name" => $formData["name"]]);
        Route::redirect(Route::root() . "?page=user.index");  
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `users` WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id]);
        Route::redirect(Route::root() . "?page=user.index");  
    }

}