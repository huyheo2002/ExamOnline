<?php
require_once "./app/controllers/ResourceController.php";
require_once "./app/models/Exam.php";
require_once "./app/models/Category.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class ExamController extends ResourceController
{
    public function index()
    {
        Gate::authorize('viewAny-exam');

        $exams = Exam::all();
        
        return include ("./resources/view/admin/exam/index.php");        
    }

    public function create()
    {
        Gate::authorize('create-exam');

        $currentUser = Auth::user();
        $categories = $currentUser->categories();

        include ("./resources/view/admin/exam/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-exam');

        $creatorId = (Auth::check()) ? Auth::user()->id : 0;
        $exam = Exam::create([
            "name" => $formData["name"],
            "category_id" => $formData["category_id"],
            "created_by" => $creatorId,
        ]);
        if ($exam !== null) {
            $exam->sync("exams_questions", "exam_id", "question_id", $formData["question_ids"]);
        }

        return Route::redirect(Route::path("exam.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-exam');

        if (!$exam = Exam::find($id)) {
            return Route::error(404);
        }
        $currentUser = Auth::user();
        if (!($currentUser->role_id == Role::OF['admin'] || $currentUser->role_id == Role::OF['staff'] || $exam->creator()->id == $currentUser->id)) {
            Route::error(403);
        }
        $categories = $currentUser->categories();
        
        return include ("./resources/view/admin/exam/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-exam');

        if (!$exam = Exam::find($id)) {
            return Route::error(404);
        }
        $currentUser = Auth::user();
        if (!($currentUser->role_id == Role::OF['admin'] || $currentUser->role_id == Role::OF['staff'] || $exam->creator()->id == $currentUser->id)) {
            Route::error(403);
        }
        $categories = $currentUser->categories();

        return include ("./resources/view/admin/exam/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-exam');

        if (!$exam = Exam::find($id)) {
            return Route::error(404);
        }
        $currentUser = Auth::user();
        if (!($currentUser->role_id == Role::OF['admin'] || $currentUser->role_id == Role::OF['staff'] || $exam->creator()->id == $currentUser->id)) {
            Route::error(403);
        }

        $creatorId = $exam->id ?? 0;
        $exam = Exam::update([
            "name" => $formData["name"],
            "category_id" => $formData["category_id"],
            "created_by" => $creatorId,
        ], $id);
        if ($exam !== null) {
            $exam->sync("exams_questions", "exam_id", "question_id", $formData["question_ids"]);
        }
        
        return Route::redirect(Route::path("exam.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-exam');

        if (!$exam = Exam::find($id)) {
            return Route::error(404);
        }
        $currentUser = Auth::user();
        if (!($currentUser->role_id == Role::OF['admin'] || $currentUser->role_id == Role::OF['staff'] || $exam->creator()->id == $currentUser->id)) {
            Route::error(403);
        }
        $exam->sync("exams_questions", "exam_id", "question_id", []);
        Exam::destroy($id);

        return Route::redirect(Route::path("exam.index"));  
    }
}