<?php

require_once "./app/Route.php";
require_once "./app/models/User.php";
require_once "./app/models/Role.php";
require_once "./app/models/Category.php";
require_once "./app/models/Exam.php";

class HomeController 
{
    public function index() 
    {
        return include("./resources/view/index.php");
    }

    public function showProfile() 
    {
        if (!Auth::check()) {
            return Route::redirect(Route::path("login"));
        }
        $user = Auth::user();

        return include("./resources/view/web/profile/show.php");
    }

    public function editProfile()
    {
        if (!Auth::check()) {
            return Route::redirect(Route::path("login"));
        }
        $user = Auth::user();
        $roles = Role::all();

        return include("./resources/view/web/profile/edit.php");
    }

    public function updateProfile()
    {
        if (!Auth::check()) {
            return Route::redirect(Route::path("login"));
        }
        $formData = array_merge(array(), $_POST);
        $formData = array_merge($formData, $_FILES);

        $user = Auth::user();
        // Lưu file nếu tồn tại (có gửi vào form)
        if ($formData["avatar"]["size"] !== 0) {
            $file = $formData["avatar"];
            $extension = current(array_slice(explode(".", $file["name"]), -1));
            $fileName = uniqid().".".$extension;
            move_uploaded_file($file["tmp_name"], User::AVATAR_PATH . $fileName);

            // Xoá file cũ
            if (file_exists(User::AVATAR_PATH . $user->avatar)) {
                unlink(User::AVATAR_PATH . $user->avatar);
            }
        }

        // Cập nhật cơ sở dữ liệu
        User::update([
            "name" => $formData["name"],
            "email" => $formData["email"],
            "username" => $formData["username"],
            "password" => $formData["password"],
            "phone" => $formData["phone"],
            "role_id" => $user->role_id,
            "avatar" => $fileName ?? $user->avatar,
        ], $user->id);

        return Route::redirect(Route::path("profile.show"));
    }

    public function indexTest() 
    {
        $categories = Category::all();

        return include("./resources/view/web/test/index.php");
    }

    public function takeTest() 
    {
        $examId = $_GET["id"];
        if ($examId == null) {
            return Route::redirect(Route::path("test.index"));
        }

        $exam = Exam::find($examId);
        if ($exam == null) {
            return Route::redirect(Route::path("test.index"));
        }

        $questions = array_merge(array(), $exam->questions());
        shuffle($questions);

        return include("./resources/view/web/test/take.php");
    }

    public function evalTest() 
    {
        $examId = $_POST["exam_id"];
        if ($examId == null) {
            return Route::redirect(Route::path("test.index"));
        }
        $exam = Exam::find($examId);
        if ($exam == null) {
            return Route::redirect(Route::path("test.index"));
        }
        $answers = $_POST["answers"];
        if ($answers == null) {
            return Route::redirect(Route::path("test.index"));
        }
        if (!Auth::check()) {
            return Route::redirect(Route::path("test.index"));
        }
        $user = Auth::user();

        $questionIds = array_map(fn($question) => $question->id, $exam->questions());
        $correctAnswerIds = array_map(fn($answer) => $answer->id, Answer::correctAnswers($examId));
        $selectedAnswerIds = array_unique($answers);

        $questionCount = count($questionIds);
        $selectedCount = count($selectedAnswerIds);
        $correctCount = count(array_intersect($correctAnswerIds, $selectedAnswerIds));

        $this->saveTestResult($exam->id, $user->id, $correctCount/$questionCount*10);

        return include("./resources/view/web/test/result.php");
    }

    private function saveTestResult($examId, $userId, $result)
    {
        $sql = "DELETE FROM `users_exams` WHERE (`exam_id` = :exam_id)";
        try {
            DB::execute($sql, [
                "exam_id" => $examId,
            ]);
        } catch (Exception $e) {
            dd($e);

            return false;
        }

        $sql = "INSERT INTO `users_exams` (`exam_id`, `user_id`, `result`, `created_at`, `updated_at`) VALUES (:exam_id, :user_id, :result, null, null)";
        try {
            DB::execute($sql, [
                'exam_id' => $examId,
                'user_id' => $userId,
                'result' => $result,
            ]);
        } catch (Exception $e) {
            dd($e);
            
            return false;
        }
        
        return true;
    }
}