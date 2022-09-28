<?php 

require_once "./app/models/BaseModel.php";
require_once "./app/models/Role.php";
require_once "./app/models/Exam.php";

class User extends BaseModel
{
    /**
     * Nơi lưu avatar.
     * DIRECTORY_SEPARATOR : chỉ là dấu / :V nma cồng kềnh hơn (dấu / tùy theo hệ điều hành vd linux với window)
     */
    public const AVATAR_PATH = "storage" . DIRECTORY_SEPARATOR . "user_avatar" . DIRECTORY_SEPARATOR;

    static protected $table = "users";

    static protected $attributes = [
        'id',
        'name',
        'email',
        'username',
        'password',
        'phone',
        'avatar',
        'role_id',
        'created_at',
        'updated_at',
    ];

    public function role() 
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'users_exams', 'user_id', 'exam_id');
    }

    // Hàm custom 
    public function getAvatarLink() 
    {   
        $link = "https://via.placeholder.com/150";
        if (!empty($this->avatar)) {
            clearstatcache();
            if (file_exists(static::AVATAR_PATH . $this->avatar)) {
                $link = "data:image/png; base64, " . base64_encode(file_get_contents(static::AVATAR_PATH . $this->avatar));
            }
        }       
        return $link;
    }
}