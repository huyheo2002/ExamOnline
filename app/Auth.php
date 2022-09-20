<?php
require_once './app/DB.php';
require_once './app/Route.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Auth
{
    static public function register($dataRegister)
    {
        $sql = "INSERT INTO `users`(`email`, `username`, `password`) VALUES(:email, :username, :password)";
        DB::execute($sql, $dataRegister);
    }

    static public function attempt($dataLogin)
    {
        $sql = "SELECT * FROM `users` WHERE ((`username` = :username) AND (`password` = :password))";
        $users = DB::execute($sql, $dataLogin);

        return !empty($users) ? $users[0] : [];
    }

    static public function login($dataLogin)
    {
        $user = Auth::attempt($dataLogin);

        if (!empty($user)) {
            $_SESSION['user_id'] = $user['id']; // Lưu id user hiện tại
            
            Route::redirect(Route::path("admin")); // Chuyển hướng đến đích mong muốn
        } else {
            echo '<script>alert("Sai email hoặc mật khẩu!")</script>';
        }
    }

    static public function check() 
    {
        $sql = "SELECT * FROM `users` WHERE id=:id";
        $users = DB::execute($sql, [
            "id" => $_SESSION["user_id"] ?? -1,
        ]);

        return !empty($users);
    }

    static public function logout()
    {
        if (isset($_SESSION["user_id"])) {
            unset($_SESSION["user_id"]);

            Route::redirect(Route::path(""));
        }
    }

    static public function user()
    {
        $sql = "SELECT * FROM `users` WHERE id=:id";
        $users = DB::execute($sql, [
            "id" => $_SESSION["user_id"] ?? -1,
        ]);

        return !empty($users) ? $users[0] : [];
    }

}
