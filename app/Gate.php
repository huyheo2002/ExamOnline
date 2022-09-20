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
                    Route::error(403);
                    return;
                }         
            }
        }
    }

    static public function set(string $key, $callback)
    {
        self::$definedGates[$key] = $callback;
    }

    static public function reset() 
    {
        foreach (self::$definedGates as $key => $value) {
            unset(self::$definedGates[$key]);
        }
    }
}