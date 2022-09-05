<?php

abstract class BaseController
{
    public function handle($action)
    {
        if(empty($action)){
            $action = "index";
        }

        switch (true){
            case !strcmp($action, "index"):
                $this->index();
                break;
            case !strcmp($action, "create"):
                $this->create();
                break;
            case !strcmp($action, "store"):
                $this->store();
                break;
            case !strcmp($action, "show"):
                $this->show();
                break;
            case !strcmp($action, "edit"):
                $this->edit();
                break;
            case !strcmp($action, "update"):
                $this->update();
                break;
            case !strcmp($action, "delete"):
                $this->delete();
                break;
            default:
                echo "cười :V";
        }
    }

    abstract public function index();
    abstract public function create();
    abstract public function store();
    abstract public function show();
    abstract public function edit();
    abstract public function update();
    abstract public function delete();
}