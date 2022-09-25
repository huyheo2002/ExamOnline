<?php

class HomeController 
{
    public function index() 
    {
        return include("./resources/view/index.php");
    }

    public function showProfile() 
    {
        return include("./resources/view/web/profile.php");
    }
}