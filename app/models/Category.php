<?php 

require_once "./app/models/BaseModel.php";
require_once "./app/models/User.php";
require_once "./app/models/Exam.php";
require_once "./app/models/Question.php";

class Category extends BaseModel
{
    static protected $table = "categories";

    static protected $attributes = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function users() 
    {
        return $this->belongsToMany(User::class, 'users_categories', 'category_id', 'user_id');
    }

    public function exams() 
    {
        return $this->hasMany(Exam::class, 'id', 'category_id');
    }

    public function questions() 
    {
        return $this->hasMany(Question::class, 'id', 'category_id');
    }
}