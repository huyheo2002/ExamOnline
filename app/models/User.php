<?php 

require_once "./app/models/BaseModel.php";
require_once "./app/models/Role.php";

class User extends BaseModel
{
    // Ảnh lưu ở đâu
    // DIRECTORY_SEPARATOR : chỉ là dấu / :V nma cồng kềnh hơn (dấu / tùy theo hệ điều hành vd linux với window)
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
}