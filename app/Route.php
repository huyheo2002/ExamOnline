<?php

class Route
{
    protected $definedRoutes = [
        "login" => "./resources/view/auth/frmLogin.html",
        "doLogin" => "./app/controllers/auth/login.php",
    ];

    public function handle(string $uri)
    {
        if(empty($uri)){
            echo "bủh";
            return;
        }

        foreach($this->definedRoutes as $definedRoute => $view){
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