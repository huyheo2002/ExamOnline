<?php

require_once "./app/Auth.php";
require_once "./app/Route.php";
require_once "./app/models/User.php";

class RegisterController 
{
    public function showRegisterForm() 
    {
        if (Auth::check()) {
            return Route::redirect(Route::root());
        }
        
        return include ("./resources/view/auth/frmRegister.html");
    }

    public function register()
    {
        $formData = [
            // Required
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            
            // Optional
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'avatar' => $_POST['avatar'] ?? '',
        ];

        if (!$user = User::create($formData)) { // Không thể tạo user
            echo '<script>alert("Đăng kí không thành công!")</script>';

            return Route::redirect(Route::path('register'));
        }

        return Route::redirect(Route::path('login'));
    }
}