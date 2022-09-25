<?php
require_once "./app/controllers/ResourceController.php";
require_once "./app/models/User.php";
require_once "./app/models/Role.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class UserController extends ResourceController
{
    public function index()
    {
        Gate::authorize('viewAny-user');

        $users = User::all();

        return include ("./resources/view/admin/user/index.php");
    }

    public function create()
    {
        Gate::authorize('create-user');

        $roles = Role::all();

        return include ("./resources/view/admin/user/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-user');

        // Lưu file nếu tồn tại (có gửi vào form)
        if ($formData["avatar"]["size"] !== 0) {
            $file = $formData["avatar"];
            $extension = current(array_slice(explode(".", $file["name"]), -1));
            $fileName = uniqid().".".$extension;
            move_uploaded_file($file["tmp_name"], User::AVATAR_PATH . $fileName);
        }

        // Lưu dữ liệu
        User::create([
            "name" => $formData["name"],
            "email" => $formData["email"],
            "username" => $formData["username"],
            "password" => $formData["password"],
            "phone" => $formData["phone"],
            "role_id" => $formData["role_id"],
            "avatar" => $fileName ?? null,
        ]);

        return Route::redirect(Route::path("user.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-user');

        $user = User::find($id);

        return include ("./resources/view/admin/user/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-user');

        $user = User::find($id);
        $roles = Role::all();

        return include ("./resources/view/admin/user/edit.php");
    }

    public function update($id, $formData)
    {        
        Gate::authorize('update-user');

        $user = User::find($id);

        // Lưu file nếu tồn tại (có gửi vào form)
        if ($formData["avatar"]["size"] !== 0) {
            $file = $formData["avatar"];
            $extension = current(array_slice(explode(".", $file["name"]), -1));
            $fileName = uniqid().".".$extension;
            move_uploaded_file($file["tmp_name"], User::AVATAR_PATH . $fileName);

            // Xoá file cũ
            if (file_exists(User::AVATAR_PATH . $user->avatar)) {
                unlink(User::AVATAR_PATH . $user->avatar);
            }
        }

        // Cập nhật cơ sở dữ liệu
        User::update([
            "name" => $formData["name"],
            "email" => $formData["email"],
            "username" => $formData["username"],
            "password" => $formData["password"],
            "phone" => $formData["phone"],
            "role_id" => $formData["role_id"],
            "avatar" => $fileName ?? $user->avatar,
        ], $id);

        return Route::redirect(Route::path("user.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-user');

        $user = User::find($id);
        if (!empty($user->avatar)) {
            // Xoá file cũ
            if (file_exists(User::AVATAR_PATH . $user->avatar)) {
                unlink(User::AVATAR_PATH . $user->avatar);
            }
        }
 
        User::destroy($id);

        return Route::redirect(Route::path("user.index"));  
    }

}