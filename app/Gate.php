<?php

require_once "./app/Route.php";

class Gate
{
    static public $definedGates = [];
    
    static public function authorize(string $key)
    {                
        foreach(self::$definedGates as $k => $func) {
            if (!strcmp($k, $key)) {
                if (! $func()) {
                    return Route::error(403);
                }         
            }
        }
    }

    static public function can(string $key)
    {
        return (
            isset(self::$definedGates[$key]) &&
            (self::$definedGates[$key]() == true)
        );
    }

    static public function set(string $key, $callback)
    {
        self::$definedGates[$key] = $callback;
    }
}