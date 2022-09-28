<?php

require_once "./app/Auth.php";
require_once "./app/Route.php";
require_once "./app/models/User.php";
require_once "./app/models/Role.php";
require_once "./app/models/Exam.php";
require_once "./app/models/Question.php";

class AdminController 
{
    public function index()
    {
        $teachers = User::allWhere('role_id', '=', Role::OF['teacher']);
        $students = User::allWhere('role_id', '=', Role::OF['student']);
        $exams = Exam::all();
        $questions = Question::all();   

        return include("./resources/view/admin/dashboard.php");
    }
}