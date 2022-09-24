<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class DB
{
    static private $connection;

    CONST DB_TYPE = "mysql";
    CONST DB_HOST = "localhost";
    CONST DB_NAME = "ql_thi_online";
    CONST USER_NAME = "root";
    CONST USER_PASSWORD = "";

    // dúng static không sd được this 
    // gọi method properties tĩnh trong class sd : self::DB_TYPE || ClassName::$connection || static::$connection
    // gọi method properties tĩnh ngoài class sd : ClassName::$connection
    static public function getConnection(){
        if(static::$connection == null)
        {
            try{
                // tìm hiểu về PDO : https://viblo.asia/p/pdo-trong-php-khai-niem-va-nhung-thao-tac-co-ban-57rVRq59R4bP

                // ví dụ kết nối csdl
                // PDO - PHP Data Objects
                // Khi làm việc với PDO bạn sẽ không cần phải viết các câu lệnh SQL cụ thể mà chỉ sử dụng các phương thức mà PDO cung cấp
                // $conn = new PDO("mysql:host=localhost;dbname=FreetutsDemo", 'root', 'vertrigo');
                static::$connection = new PDO(self::DB_TYPE.":host=".self::DB_HOST. ";dbname=" .self::DB_NAME, self::USER_NAME, self::USER_PASSWORD);
            } catch(Exception $exception){
                throw new Exception("connection fail");
            }
        }
        return static::$connection;
    }

    static public function execute($sql, $param = [])
    {
        // tạo đối tượng prepare lưu trữ câu lệnh truy vấn sql
        // ví dụ truy xuất
        // $stmt = $conn->prepare('INSERT INTO users (name, email, age) values (?, ?, ?)');
        // $stmt = $conn->prepare('INSERT INTO users (name, email, age) values (:name, :mail, :age)');

        // gán biến
        // $stmt->bindParam(1, $name);
        // $stmt->bindParam(2, $mail);
        // $stmt->bindParam(3, $age);
        $statement = DB::getConnection()->prepare($sql);
        
        // đọc dữ liệu từ DB
        // PDO::FETCH_ASSOC: Trả về dữ liệu dạng mảng với key là tên của column (column của các table trong database)        
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        // gán giá trị và thực thi truy vấn
        // FETCH_ASSOC Kiểu fetch này sẽ tạo ra một mảng kết hợp lập chỉ mục theo tên column (nghĩa là các key của mảng chính là tên của column)
        $result = $statement->execute($param);

        // self::debug($statement);
        if (!$result) {
            // var_dump(self::$connection->errorInfo());
            // die;
            throw new Exception(self::$connection->errorInfo()[2]);
        }
        
        // Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả trả về
        $data = [];
        while($item = $statement->fetch()) {
            $data[]=$item; 
        }
        return $data;  
    }

    static public function debug($statement) 
    {
        var_dump($statement->debugDumpParams());
        die;
    }
}
