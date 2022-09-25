<?php

require_once './app/DB.php';
require_once './app/Route.php';
require_once './app/models/User.php';
require_once './app/models/Role.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Auth
{
    /**
     * Đăng nhập sử dụng form. Sẽ so sánh mật khẩu.
     * @return bool
     */
    static public function attempt($credentials)
    {
        $user = User::firstWhere('username', '=', $credentials["username"]);
        if (!$user) { 
            // Không có tài khoản này
            return false;
        }
        
        if ($user->password !== $credentials['password']) {
            // Mật khẩu không đúng
            return false;
        }

        static::login($user);
        return true;
    }

    /**
     * Đăng nhập sử dụng model user. Không cần mật khẩu.
     * @return void
     */
    static public function login(User $user)
    {
        $_SESSION['user_id'] = $user->id; // Lưu id user hiện tại
        $_SESSION['username'] = $user->username; // Xác thực user. Nên sử dụng token thay vì username
    }

    /**
     * Kiểm tra đăng nhập. Đồng thời xác thực phiên đăng nhập.
     * @return bool
     */
    static public function check() 
    {
        $user = self::user();

        return ( $user !== null
            && isset($_SESSION['username']) 
            && $user->username == $_SESSION['username']
        );
    }

    /**
     * Đăng xuất.
     * @return void
     */
    static public function logout()
    {
        unset($_SESSION["user_id"]);
        unset($_SESSION["username"]);
    }

    /**
     * Lấy user đang đăng nhập
     */
    static public function user()
    {
        return User::find($_SESSION['user_id'] ?? -1);
    }
}
