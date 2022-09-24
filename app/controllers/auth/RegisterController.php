<?php

require_once "./app/Auth.php";
require_once "./app/Route.php";

class RegisterController 
{
    public function showRegisterForm() 
    {
        //
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

        if (!Auth::register($formData)) { // Đăng kí không thành công
            echo '<script>alert("Đăng kí không thành công!")</script>';

            return Route::redirect(Route::path('register'));
        }

        return Route::redirect(Route::path('login'));
    }
}