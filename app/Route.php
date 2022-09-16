<?php

class Route
{
    private $definedRoutes = [];
    
    public function handle(string $uri)
    {                
        foreach($this->definedRoutes as $key => $func) {
            if (!strcmp($uri, $key)) {
                $func(); 
                return true;               
            }            
        }
        
        return false;
    }

    public function set(string $uri, $callback)
    {
        $this->definedRoutes[$uri] = $callback;
    }

    public function resource(string $uri, string $className) 
    {
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();

        $this->set($uri.".index", fn() => $obj->handle("index"));
        $this->set($uri.".show", fn() => $obj->handle("show"));
        $this->set($uri.".create", fn() => $obj->handle("create"));
        $this->set($uri.".store", fn() => $obj->handle("store"));
        $this->set($uri.".edit", fn() => $obj->handle("edit"));
        $this->set($uri.".update", fn() => $obj->handle("update"));
        $this->set($uri.".delete", fn() => $obj->handle("delete"));
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