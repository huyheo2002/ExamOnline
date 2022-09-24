<?php
require_once "./app/controllers/ResourceController.php";
require_once "./app/DB.php";
require_once "./app/Route.php";
require_once "./app/Gate.php";

class CategoryController extends ResourceController
{
    // Role Id của giáo viên. Sửa lại nếu database khác.
    protected const TEACHER = 3;

    public function index()
    {
        Gate::authorize('viewAny-permission-group');

        $sql = "SELECT * FROM `categories`";
        $categories = DB::execute($sql);
        
        $sql = "SELECT `users`.* FROM `users_categories`, `users` WHERE (`users_categories`.`user_id` = `users`.`id` and `users_categories`.`category_id` = :id)";
        for ($i = 0; $i < count($categories); $i++) {
            $categories[$i]["users"] = array_merge(array(), DB::execute($sql, ["id" => $categories[$i]["id"]]));  
        }

        return include ("./resources/view/admin/category/index.php");
    }

    public function create()
    {
        Gate::authorize('create-permission-group');

        $sql = "SELECT * FROM `users` WHERE (`role_id` = :role_id)";
        $teachers = DB::execute($sql, [
            'role_id' => self::TEACHER,
        ]);
        
        return include ("./resources/view/admin/category/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-permission-group');
        
        $sql = "INSERT INTO`categories` (`id`, `name`, `created_at`, `updated_at`) VALUES (null, :name, null, null)";
        DB::execute($sql, [
            "name" => $formData["name"]
        ]);

        $sql = "SELECT LAST_INSERT_ID() FROM `categories`"; 
        $lastInsertId = DB::execute($sql)[0]["LAST_INSERT_ID()"];

        $sql = "INSERT INTO `users_categories` (`user_id`, `category_id`, `created_at`, `updated_at`) VALUES (:user_id, :category_id, null, null)";
        foreach($formData["teacher_ids"] as $user_id) {
            DB::execute($sql, [
                "user_id" => $user_id,
                "category_id" => $lastInsertId
            ]);
        }
        
        return Route::redirect(Route::path("category.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-category');

        $sql = "SELECT * FROM `categories` WHERE (`id` = :id)";
        $category = DB::execute($sql, ["id" => $id])[0];
        
        $sql = "SELECT `users`.* FROM `users_categories`, `users` WHERE (`users_categories`.`user_id` = `users`.`id` AND `users_categories`.`category_id` = :id)";
        $category["users"] = array_merge(array(), DB::execute($sql, ["id" => $category["id"]])); 

        $sql = "SELECT * FROM `users` WHERE (`role_id` = :role_id)";
        $teachers = DB::execute($sql, [
            'role_id' => self::TEACHER,
        ]);

        return include ("./resources/view/admin/category/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-category');
        
        $sql = "SELECT * FROM `categories` WHERE (`id` = :id)";
        $category = DB::execute($sql, ["id" => $id])[0];
        
        $sql = "SELECT `users`.* FROM `users_categories`, `users` WHERE (`users_categories`.`user_id` = `users`.`id` AND `users_categories`.`category_id` = :id)";
        $category["users"] = array_merge(array(), DB::execute($sql, ["id" => $category["id"]])); 

        $sql = "SELECT * FROM `users` WHERE (`role_id` = :role_id)";
        $teachers = DB::execute($sql, [
            'role_id' => self::TEACHER,
        ]);

        return include ("./resources/view/admin/category/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-category');
        
        $sql = "UPDATE `categories` SET `name` = :name WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id, "name" => $formData["name"]]);
        
        $sql = "DELETE FROM `users_categories` WHERE (`category_id` = :id)";
        DB::execute($sql, ["id" => $id]);

        $sql = "INSERT INTO `users_categories` (`user_id`, `category_id`, `created_at`, `updated_at`) VALUES (:user_id, :category_id, null, null)";
        foreach($formData["teacher_ids"] as $user_id) {
            DB::execute($sql, [
                "user_id" => $user_id,
                "category_id" => $id
            ]);
        }

        return Route::redirect(Route::path("category.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-category');
        
        $sql = "DELETE FROM `users_categories` WHERE (`category_id` = :id)";
        DB::execute($sql, ["id" => $id]);

        $sql = "DELETE FROM `categories` WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id]);
        
        return Route::redirect(Route::path("category.index"));  
    }

}