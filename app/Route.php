<?php

class Route
{
    private static $definedRoutes = [
        "" => "./resources/view/index.php",
        "login" => "./resources/view/auth/frmLogin.html",
        "doLogin" => "./app/controllers/auth/login.php",
        "admin" => "./resources/view/layout/admin/master.php",
    ];

    public static function handle(string $uri)
    {
        if(empty($uri)){
            $uri = "";
        }

        foreach(static::$definedRoutes as $definedRoute => $view){
            // self:: để gọi hằng trong class
            if(!strcmp($definedRoute, $uri)){
                include($view);
                return;
            }
        }

        echo "ko có route này";
        return;
    }

    public static function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    public static function root()
    {
        return "http://".$_SERVER["HTTP_HOST"]."/HocPHP/HeThongQuanLyThiTrucTuyen/";
    }
}