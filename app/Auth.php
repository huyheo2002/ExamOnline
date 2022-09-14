<?php
require_once './app/DB.php';
require_once './app/Route.php';

class Auth
{
    static public function getDataAll()
    {
        $sql = "select * from users";
        $users = DB::execute($sql);

        return $users;
    }

    static public function register($dataRegister)
    {
        $sql = "insert into users(email, username, password) values(:email, :username, :password)";
        DB::execute($sql, $dataRegister);
    }


    static public function getData($dataLogin)
    {
        $sql = "select * from users where email=:email";
        $user = DB::execute($sql, $dataLogin);
        return count($user) > 0 ? $user[0] : [];
    }

    static public function attempt($dataLogin)
    {

        $sql = "select * from users where (username = :username) and (password = :password)";
        $user = DB::execute($sql, $dataLogin);
        return count($user) > 0 ? $user[0] : [];
    }


    static public function login($dataLogin)
    {
        $user = Auth::attempt($dataLogin);

        if (count($user) > 0) {
            $_SESSION['message'] = "Login success";
            $_SESSION['message_login'] = "Login success";
            $_SESSION['dataUser'] = $user['username'];
            $_SESSION['dataEmail'] = $user['email'];

            Route::redirect(Route::root()."?page=admin");
        } else {
            echo '<script>alert("Sai email hoặc mật khẩu!")</script>';
        }
    }

    static public function logout()
    {
        if (isset($_SESSION['message_Logout'])) {
            unset($_SESSION['message']);
            unset($_SESSION['dataUser']);
            unset($_SESSION['message_logout']);
            // header("location:./Login.php");
        }
    }

    static public function find($email)
    {
        $sql = "select * from users where email=:email";
        $dataFind = ['email' => $email];

        $user = DB::execute($sql, $dataFind);

        return count($user) > 0 ? $user[0] : [];
    }

    static public function update($dataUpdate)
    {
        $sql = "update users set username=:username,password=:password where email=:email";
        $check = DB::execute($sql, $dataUpdate);
        return count($check) > 0 ? $check[0] : [];
        if (count($check) > 0) {
            $_SESSION['message_update'] = "update success";
        }
    }

    static public function delete($email)
    {
        $sql = "delete from users where email=:email";
        $dataDelete = ['email' => $email];
        DB::execute($sql, $dataDelete);
    }
}
