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
                $formData = array_merge(array(), $_POST);
                $formData = array_merge($formData, $_FILES);
                $this->store($formData);
                break;
            case !strcmp($action, "show"):
                $id = $_GET["id"] ?? 0;
                $this->show($id);
                break;
            case !strcmp($action, "edit"):
                $id = $_GET["id"] ?? 0;
                $this->edit($id);
                break;
            case !strcmp($action, "update"):
                $id = $_GET["id"] ?? 0;
                $formData = array_merge(array(), $_POST);
                $formData = array_merge($formData, $_FILES);
                $this->update($id, $formData);
                break;
            case !strcmp($action, "delete"):
                $id = $_GET["id"] ?? 0;
                $this->delete($id);
                break;
            default:
                echo "cười :V";
        }
    }

    abstract public function index();
    abstract public function create();
    abstract public function store($formData);
    abstract public function show($id);
    abstract public function edit($id);
    abstract public function update($id, $formData);
    abstract public function delete($id);
}