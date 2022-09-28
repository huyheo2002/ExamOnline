<?php
require_once "./app/controllers/ResourceController.php";
require_once "./app/models/Question.php";
require_once "./app/models/Category.php";
require_once "./app/models/Answer.php";
require_once "./app/DB.php";
require_once "./app/Route.php";
require_once "./app/Auth.php";

class QuestionController extends ResourceController
{
    public function index()
    {
        Gate::authorize('viewAny-question');

        $questions = Question::all();

        return include ("./resources/view/admin/question/index.php");
    }

    public function create()
    {
        Gate::authorize('create-question');

        $categories = Category::all();
        
        return include ("./resources/view/admin/question/create.php");
    }

    public function store($formData)
    {
        Gate::authorize('create-question');
        
        // Validate 
        if (empty($formData["content"])) {
            dd("Không được bro");
            return;
        }
        if ($formData["answers"]["correct"] == null) {
            dd("Không có đáp án à bro");
            return;
        }

        $creatorId = (Auth::check()) ? Auth::user()->id : 1;
        $question = Question::create([
            "content" => $formData["content"],
            "category_id" => $formData["category_id"],
            "created_by" => $creatorId,
        ]);
        if ($question !== null) {
            foreach($formData["answers"]["content"] as $count => $content) {
                Answer::create([
                    "content" => $content,
                    "correct" => ($count == $formData["answers"]["correct"]),
                    "question_id" => $question->id,
                ]);
            }
        }

        return Route::redirect(Route::path("question.index"));       
    }

    public function show($id)
    {
        Gate::authorize('view-question');
        if (!$question = Question::find($id)) {
            Route::error(404);
        }
        $currentUser = Auth::user();
        if (!($currentUser->role_id == Role::OF['admin'] || $currentUser->role_id == Role::OF['staff'] || $question->creator()->id == $currentUser->id)) {
            Route::error(403);
        }
        $categories = Category::all();
        
        return include ("./resources/view/admin/question/show.php");
    }

    public function edit($id)
    {
        Gate::authorize('update-question');

        if (!$question = Question::find($id)) {
            return Route::error(404);
        }
        $currentUser = Auth::user();
        if (!($currentUser->role_id == Role::OF['admin'] || $currentUser->role_id == Role::OF['staff'] || $question->creator()->id == $currentUser->id)) {
            Route::error(403);
        }
        $categories = Category::all();
        
        return include ("./resources/view/admin/question/edit.php");
    }

    public function update($id, $formData)
    {
        Gate::authorize('update-question');

        // Validate 
        if (!$question = Question::find($id)) {
            return Route::error(404);
        }
        $currentUser = Auth::user();
        if (!($currentUser->role_id == Role::OF['admin'] || $currentUser->role_id == Role::OF['staff'] || $question->creator()->id == $currentUser->id)) {
            Route::error(403);
        }
        if (empty($formData["content"])) {
            dd("Không được bro");
            return;
        }
        if (empty($formData["answers"]["correct"])) {
            dd("Không có đáp án à bro");
            return;
        }

        $creatorId = $question->created_by ?? 1;
        $question = Question::update([
            "content" => $formData["content"],
            "category_id" => $formData["category_id"],
            "created_by" => $creatorId,
        ], $id);
        $answerIds = array_map(fn($answer) => $answer->id, $question->answers());
        foreach($answerIds as $answerId) {
            Answer::destroy($answerId);
        }
        if ($question !== null) {
            foreach($formData["answers"]["content"] as $count => $content) {
                Answer::create([
                    "content" => $content,
                    "correct" => ($count == $formData["answers"]["correct"]),
                    "question_id" => $question->id,
                ]);
            }
        }

        return Route::redirect(Route::path("question.index"));  
    }

    public function delete($id)
    {
        Gate::authorize('delete-question');

        if (!$question = Question::find($id)) {
            return Route::error(404);
        }
        $currentUser = Auth::user();
        if (!($currentUser->role_id == Role::OF['admin'] || $currentUser->role_id == Role::OF['staff'] || $question->creator()->id == $currentUser->id)) {
            Route::error(403);
        }
        $answerIds = array_map(fn($answer) => $answer->id, $question->answers());
        foreach($answerIds as $answerId) {
            Answer::destroy($answerId);
        }
        Question::destroy($id);

        return Route::redirect(Route::path("question.index"));  
    }

}