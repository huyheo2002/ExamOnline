<?php
require_once "./app/controllers/admin/BaseController.php";
require_once "./app/DB.php";
require_once "./app/Route.php";

class UserController extends BaseController
{
    // lưu ảnh vào đâu đó
    //DIRECTORY_SEPARATOR : chỉ là dấu / :V nma cồng kềnh hơn (dấu / tùy theo hệ điều hành vd linux với window)
    private $storagePath = "storage" . DIRECTORY_SEPARATOR . "user_avatar" . DIRECTORY_SEPARATOR;

    public function index()
    {
        $sql = "SELECT * FROM `users`";
        $users = DB::execute($sql);
        
        $sql = "SELECT * FROM `roles` WHERE (`id` = :id)";        
        foreach ($users as $key => $user) {
            $users[$key]["role"] = DB::execute($sql, ["id" => $users[$key]["role_id"]])[0];
        }
                
        foreach ($users as $key => $user) {
            $link = "https://via.placeholder.com/150";
            if (!empty($user["avatar"])) {
                // xóa bộ nhớ đệm
                // https://www.w3schools.com/php/func_filesystem_file_exists.asp
                clearstatcache();
                if (file_exists($this->storagePath . $user["avatar"])) {
                    // https://stackoverflow.com/questions/8499633/how-to-display-base64-images-in-html
                    // bắt buộc phải viết nnay :v
                    $link = "data:image/png; base64, " . base64_encode(file_get_contents($this->storagePath . $user["avatar"]));
                }
            }
            $users[$key]["avatar"] = $link;
        }

        include ("./resources/view/admin/user/index.php");
    }

    public function create()
    {
        $sql = "SELECT * FROM `roles`";
        $roles = DB::execute($sql);

        include ("./resources/view/admin/user/create.php");
    }

    public function store($formData)
    {
        // Lưu file nếu tồn tại (có gửi vào form)
        if (!empty($formData["avatar"])) {
            $file = $formData["avatar"];
            $originalName = explode(".", $file["name"]);
            $extension = $originalName[1];
            $fileName = uniqid().".".$originalName[1];
            move_uploaded_file($file["tmp_name"], $this->storagePath.$fileName);
        }

        // Lưu dữ liệu
        $sql = "INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `phone`, `role_id`, `avatar`, `created_at`, `updated_at`) VALUES (null, :name, :email, :username, :password, :phone, :role_id, :avatar, null, null)";
        DB::execute($sql, 
        [
            "name" => $formData["name"],
            "email" => $formData["email"],
            "username" => $formData["username"],
            "password" => $formData["password"],
            "phone" => $formData["phone"],
            "role_id" => $formData["role_id"],
            "avatar" => $fileName ?? null,
        ]); 
        Route::redirect(Route::root() . "?page=user.index");       
    }

    public function show($id)
    {
        $sql = "SELECT * FROM `users` WHERE (`id` = :id)";
        $user = DB::execute($sql, ["id" => $id])[0];

        $user["role"] = null;
        if (!empty($user["role_id"])) {
            $sql = "SELECT * FROM `roles` WHERE (`id` = :id)";
            $user["role"] = DB::execute($sql, ["id" => $user["role_id"]])[0];
        }

        $link = "https://via.placeholder.com/150";
        if (!empty($user["avatar"])) {
            clearstatcache();
            if (file_exists($this->storagePath . $user["avatar"])) {
                $link = "data:image/png; base64, " . base64_encode(file_get_contents($this->storagePath . $user["avatar"]));
            }
        }
        $user["avatar"] = $link;

        include ("./resources/view/admin/user/show.php");
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM `users` WHERE (`id` = :id)";
        $user = DB::execute($sql, ["id" => $id])[0];

        $sql = "SELECT * FROM `roles`";
        $roles = DB::execute($sql);

        $link = "https://via.placeholder.com/150";
        if (!empty($user["avatar"])) {
            clearstatcache();
            if (file_exists($this->storagePath . $user["avatar"])) {
                $link = "data:image/png; base64, " . base64_encode(file_get_contents($this->storagePath . $user["avatar"]));
            }
        }
        $user["avatar"] = $link;

        include ("./resources/view/admin/user/edit.php");
    }

    public function update($id, $formData)
    {        
        $sql = "SELECT * FROM `users` WHERE (`id` = :id)";
        $user = DB::execute($sql, ["id" => $id])[0];

        // Lưu file nếu tồn tại (có gửi vào form)
        if (!empty($formData["avatar"])) {
            $file = $formData["avatar"];
            $originalName = explode(".", $file["name"]);
            $extension = $originalName[1];
            $fileName = uniqid().".".$originalName[1];
            move_uploaded_file($file["tmp_name"], $this->storagePath.$fileName);

            // Xoá file cũ
            if (file_exists($this->storagePath . $user["avatar"])) {
                unlink($this->storagePath . $user["avatar"]);
            }
        }

        // Cập nhật cơ sở dữ liệu
        $sql = "UPDATE `users` SET `name` = :name, `email` = :email, `username` = :username, `password` = :password, `phone` = :phone, `role_id` = :role_id, `avatar` = :avatar WHERE (`id` = :id)";
        DB::execute($sql, [
            "id" => $id, 
            "name" => $formData["name"],
            "email" => $formData["email"],
            "username" => $formData["username"],
            "password" => $formData["password"],
            "phone" => $formData["phone"],
            "role_id" => $formData["role_id"],
            "avatar" => $fileName ?? $user["avatar"],
        ]);

        Route::redirect(Route::root() . "?page=user.index");  
    }

    public function delete($id)
    {
        $sql = "SELECT * FROM `users` WHERE (`id` = :id)";
        $user = DB::execute($sql, ["id" => $id])[0];
        if (!empty($user["avatar"])) {
            // Xoá file cũ
            if (file_exists($this->storagePath . $user["avatar"])) {
                unlink($this->storagePath . $user["avatar"]);
            }
        }

        $sql = "DELETE FROM `users` WHERE (`id` = :id)";
        DB::execute($sql, ["id" => $id]);

        Route::redirect(Route::root() . "?page=user.index");  
    }

}