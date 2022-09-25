<?php 

require_once "./app/models/BaseModel.php";
require_once "./app/models/Category.php";
require_once "./app/models/User.php";
require_once "./app/models/Exam.php";
require_once "./app/models/Answer.php";

class Question extends BaseModel
{
    static protected $table = "questions";

    static protected $attributes = [
        'id',
        'content',
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
    
    public function exams() 
    {
        return $this->belongsToMany(Exam::class, 'exams_questions', 'question_id', 'exam_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'id', 'question_id');
    }
}