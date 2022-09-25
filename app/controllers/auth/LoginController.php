<?php

require_once "./app/Auth.php";
require_once "./app/Route.php";
require_once "./app/models/Role.php";

class LoginController 
{
    protected function redirectPath() 
    {
        if (!Auth::check()) {
            return Route::root();
        }

        switch (Auth::user()->role_id)
        {
            case Role::OF["admin"]:
            case Role::OF["staff"]:
            case Role::OF["teacher"]:
                return Route::path("admin"); 
                break;

            case Role::OF["student"]:
            default:
                return Route::path("home"); 
                break;
        }
    }

    public function showLoginForm() 
    {
        include ("./resources/view/auth/frmLogin.html");
    }

    public function login()
    {
        $formData = [
            'username' => $_POST["username"],
            'password' => $_POST["password"]
        ];
    
        if (!Auth::attempt($formData)) {
            echo '<script>alert("Đăng nhập không thành công!")</script>';

            return Route::redirect(Route::path("login"));
        }
    
        return Route::redirect($this->redirectPath());
    }

    public function logout() 
    {
        Auth::logout();

        Route::redirect(Route::path(""));
    }
}