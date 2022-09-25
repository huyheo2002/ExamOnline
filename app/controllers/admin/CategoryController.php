<?php

require_once "./app/controllers/ResourceController.php";
require_once "./app/models/Category.php";
require_once "./app/models/Role.php";
require_once "./app/models/User.php";
require_once "./app/DB.php";
require_once "./app/Route.php";
require_once "./app/Gate.php";

class CategoryController extends ResourceController
{
    public function index()
    {
        Gate::authorize('viewAny-permission-group');

        $categories = Category::all();

        return include ("./resources/view/admin/category/index.php");
    }

    public function create()
    {
        Gate::authorize('create-permission-group');

        $teachers = User::allWhere('role_id', '=', Role::OF["teacher"]);
        
        return include ("./resources/view/admin/category/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-permission-group');
        
        // Validate
        $teacherIds = array_map(fn($user) => $user->id, 
            User::allWhere('role_id', '=', Role::OF["teacher"])
        );
        if (!empty($formData["teacher_ids"])) {
            foreach($formData["teacher_ids"] as $userId) {
                if (!in_array($userId, $teacherIds)) {
                    echo "<script> alert('Người dùng được chọn không phải là giáo viên!'); </script>";
                    
                    return Route::redirect(Route::path("category.index"));
                }
            }
        }

        // Insert
        $category = Category::create([
            "name" => $formData["name"]
        ]);
        if ($category !== null) {
            $category->sync('users_categories', 'category_id', 'user_id', $formData['teacher_ids']);
        }
        
        return Route::redirect(Route::path("category.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-category');

        $category = Category::find($id);
        $teachers = User::allWhere('role_id', '=', Role::OF["teacher"]);

        return include ("./resources/view/admin/category/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-category');
        
        $category = Category::find($id);
        $teachers = User::allWhere('role_id', '=', Role::OF["teacher"]);

        return include ("./resources/view/admin/category/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-category');
        
        // Validate
        $teacherIds = array_map(fn($user) => $user->id, 
            User::allWhere('role_id', '=', Role::OF["teacher"])
        );
        if (!empty($formData["teacher_ids"])) {
            foreach($formData["teacher_ids"] as $userId) {
                if (!in_array($userId, $teacherIds)) {
                    echo "<script> alert('Người dùng được chọn không phải là giáo viên!'); </script>";
                    
                    return Route::redirect(Route::path("category.index"));
                }
            }
        }

        // Insert
        $category = Category::update([
            "name" => $formData["name"]
        ], $id);
        if ($category !== null) {
            $category->sync('users_categories', 'category_id', 'user_id', $formData['teacher_ids']);
        }

        return Route::redirect(Route::path("category.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-category');

        $category = Category::find($id);
        if ($category !== null) {
            $category->sync('users_categories', 'category_id', 'user_id', []);
        }
        Category::destroy($id);
        
        return Route::redirect(Route::path("category.index"));  
    }
}