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
        $sql = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `phone`, `role_id`, `avatar`) VALUES(:name, :email, :username, :password, :phone, :role_id, :avatar)";
        $dataRegister['role_id'] = 4;

        try {
            DB::execute($sql, $dataRegister);

            return true;
        } catch (Exception $e) {
            return false;
        }
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

        if (empty($user)) {
            return false;
        } 

        $_SESSION['user_id'] = $user['id']; // Lưu id user hiện tại
        
        return true;
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

            return true;
        }

        return false;
    }

    static public function user()
    {
        $sql = "SELECT * FROM `users` WHERE id=:id";
        $users = DB::execute($sql, [
            "id" => $_SESSION["user_id"] ?? -1,
        ]);

        $storagePath = "storage" . DIRECTORY_SEPARATOR . "user_avatar" . DIRECTORY_SEPARATOR;
        foreach ($users as $key => $user) {
            $link = "https://via.placeholder.com/150";
            if (!empty($user["avatar"])) {
                clearstatcache();
                if (file_exists($storagePath . $user["avatar"])) {
                    $link = "data:image/png; base64, " . base64_encode(file_get_contents($storagePath . $user["avatar"]));
                }
            }
            $users[$key]["avatar"] = $link;
        }

        return !empty($users) ? $users[0] : [];
    }

}
