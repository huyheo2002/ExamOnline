<?php 

require_once "./app/models/BaseModel.php";
require_once "./app/models/Question.php";

class Answer extends BaseModel
{
    static protected $table = "answers";

    static protected $attributes = [
        'id',
        'content',
        'correct',
        'question_id',
        'created_at',
        'updated_at',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}