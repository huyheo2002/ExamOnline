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