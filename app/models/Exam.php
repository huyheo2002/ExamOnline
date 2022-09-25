<?php 

require_once "./app/models/BaseModel.php";
require_once "./app/models/Category.php";
require_once "./app/models/User.php";
require_once "./app/models/Question.php";

class Exam extends BaseModel
{
    static protected $table = "exams";

    static protected $attributes = [
        'id',
        'name',
        'category_id',
        'created_by',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function creator() 
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    
    public function questions() 
    {
        return $this->belongsToMany(Question::class, 'exams_questions', 'exam_id', 'question_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_exams', 'exam_id', 'user_id');
    }
}