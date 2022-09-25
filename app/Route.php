<?php

class Route
{
    static public $definedRoutes = [];
    
    static public function handle(string $uri)
    {                
        foreach(self::$definedRoutes as $key => $func) {
            if (!strcmp($uri, $key)) {
                $func(); 
                return true;               
            }            
        }
        
        echo "Undefined route";
        return false;
    }

    /**
     * set(string $uri, function $callback) => assign a route to an individual function
     * set(string $uri, array(string $classPath, string $callback)) => assign a route to a method of a class
     */
    static public function set(string $uri, $callback)
    {
        if (is_array($callback)) {
            $classPath = $callback[0];
            $className = current(array_slice(explode("/", $classPath), -1));
            $funcName = $callback[1];

            require_once "./app/".$classPath.".php";
            $obj = new $className();

            self::set($uri, fn() => $obj->$funcName());
        } else {
            self::$definedRoutes[$uri] = $callback;
        }
    }

    static public function resource(string $uri, string $classPath) 
    {
        $className = current(array_slice(explode("/", $classPath), -1));

        require_once "./app/".$classPath.".php";
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
        // khi sd cho local mà có folder . . . :V
        return "http://".$_SERVER["HTTP_HOST"]."/HocPHP/HeThongQuanLyThiTrucTuyen/";
        // khi sd virtual host
        // return "http://".$_SERVER["HTTP_HOST"];
    }

    public static function path($routeName, $data = [])
    {
        $url = self::root() . "?page=" . $routeName;
        foreach ($data as $key => $value) {
            $url .= "&" . $key . "=" . $value;
        }

        return $url;
    }

    public static function error($statusCode) 
    {
        switch ($statusCode) {
            case 403:
                http_response_code($statusCode);
                include "./resources/view/error/403.php";
            break;
        }
        die;
    }
}