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

    /**
     * Special function to get answers quickly
     */
    public static function correctAnswers($examId) 
    {    
        $sql = "SELECT * FROM `".static::$table."` WHERE (`correct` = 1 AND `question_id` IN (SELECT `question_id` FROM `exams_questions` WHERE `exam_id` = :exam_id))";
        
        try {
            $result = DB::execute($sql, ['exam_id' => $examId]);
        } catch (Exception $e) {
            dd($e);
            return [];
        }
        if (empty($result)) {
            return [];
        } 
        
        $collection = array_map(function($record) {
            $obj = new static;
            foreach(static::$attributes as $attribute) {
                $obj->$attribute = $record[$attribute];
            }

            return $obj;
        }, $result);
        
        return $collection;
    }
}