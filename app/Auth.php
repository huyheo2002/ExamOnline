<?php

require_once("./app/Route.php");

class Auth
{
    protected $loggedIn = false;
    protected $username = "";
    protected $password = "";

    public function login(string $username, string $password, $db = NULL)
    {
        if(!$db){
            // chưa khởi tạo sd :: 
            // return Route::redirect(Route::root());
            return;
        }

        $result = $db->selectTable("users", ["*"],[
            "username" => $username,
            "password" => $password
        ]);
        if(count($result) === 0){
            echo "Đăng nhập thất bại";
            return;            
        }

        echo "Đăng nhập thành công";
        $this->loggedIn = true;
        $this->username = $username;
        $this->password = $password;
        return;
    }

    
}