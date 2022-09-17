<?php

class Route
{
    static private $definedRoutes = [];
    
    static public function handle(string $uri)
    {                
        foreach(self::$definedRoutes as $key => $func) {
            if (!strcmp($uri, $key)) {
                $func(); 
                return true;               
            }            
        }
        
        return false;
    }

    static public function set(string $uri, $callback)
    {
        self::$definedRoutes[$uri] = $callback;
    }

    static public function resource(string $uri, string $className) 
    {
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();

        self::set($uri.".index", fn() => $obj->handle("index"));
        self::set($uri.".show", fn() => $obj->handle("show"));
        self::set($uri.".create", fn() => $obj->handle("create"));
        self::set($uri.".store", fn() => $obj->handle("store"));
        self::set($uri.".edit", fn() => $obj->handle("edit"));
        self::set($uri.".update", fn() => $obj->handle("update"));
        self::set($uri.".delete", fn() => $obj->handle("delete"));
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

    public static function path($routeName, $data = [])
    {
        $url = self::root() . "?page=" . $routeName;
        foreach ($data as $key => $value) {
            $url .= "&" . $key . "=" . $value;
        }

        return $url;
    }

    
    

}