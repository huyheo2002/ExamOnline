<?php
require_once "./app/controllers/admin/BaseController.php";
require_once "./app/DB.php";
require_once "./app/Route.php";
require_once "./app/Gate.php";

class CategoryController extends BaseController
{
    public function index()
    {
        Gate::authorize('viewAny-permission-group');

        $sql = "SELECT * FROM `categories`";
        $categories = DB::execute($sql);
        
        include ("./resources/view/admin/category/index.php");
    }

    public function create()
    {
        Gate::authorize('create-permission-group');
        
        include ("./resources/view/admin/category/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-permission-group');
        
        $sql = "INSERT INTO`categories` (`id`, `name`, `created_at`, `updated_at`) VALUES (null, :name, null, null)";
        DB::execute($sql, ["name" => $formData["name"]]); 
        
        Route::redirect(Route::path("category.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-category');

        $sql = "SELECT * FROM `categories` WHERE (`id` = :id)";
        $category = DB::execute($sql, ["id" => $id])[0];
        
        include ("./resources/view/admin/category/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-category');
        
        $sql = "SELECT * FROM `categories` WHERE (`id` = :id)";
        $category = DB::execute($sql, ["id" => $id])[0];
        
        include ("./resources/view/admin/category/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-category');
        
        $sql = "UPDATE `categories` SET `name` = :name WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id, "name" => $formData["name"]]);
        
        Route::redirect(Route::path("category.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-category');
        
        $sql = "DELETE FROM `categories` WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id]);
        
        Route::redirect(Route::path("category.index"));  
    }

}