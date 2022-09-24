<?php

require_once "./app/Auth.php";
require_once "./app/Route.php";

class LoginController 
{
    protected function redirectPath() 
    {
        if (!Auth::check()) {
            return Route::root();
        }

        switch (Auth::user()['role_id'])
        {
            case 1:
            case 2:
            case 3:
                return Route::path("admin"); 
                break;

            case 4:
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
    
        if (!Auth::login($formData)) {
            echo '<script>alert("Đăng nhập không thành công!")</script>';

            return Route::redirect(Route::path("login"));
        }
    
        return Route::redirect($this->redirectPath());
    }

    public function logout() 
    {
        // Đăng xuất không thành công :V
        if (!Auth::logout()) {
            Route::redirect(Route::path(""));
        };

        Route::redirect(Route::path(""));
    }
}