<?php

require_once "./app/Route.php";
require_once "./app/models/User.php";
require_once "./app/models/Role.php";

class HomeController 
{
    public function index() 
    {
        return include("./resources/view/index.php");
    }

    public function showProfile() 
    {
        if (!Auth::check()) {
            return Route::redirect(Route::path("login"));
        }
        $user = Auth::user();

        return include("./resources/view/web/profile/show.php");
    }

    public function editProfile()
    {
        if (!Auth::check()) {
            return Route::redirect(Route::path("login"));
        }
        $user = Auth::user();
        $roles = Role::all();

        return include("./resources/view/web/profile/edit.php");
    }

    public function updateProfile()
    {
        if (!Auth::check()) {
            return Route::redirect(Route::path("login"));
        }
        $formData = array_merge(array(), $_POST);
        $formData = array_merge($formData, $_FILES);

        $user = Auth::user();
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
            "role_id" => $user->role_id,
            "avatar" => $fileName ?? $user->avatar,
        ], $user->id);

        return Route::redirect(Route::path("profile.show"));
    }

    public function doExam() 
    {
        return include("./resources/view/web/doExam.php");
    }
}