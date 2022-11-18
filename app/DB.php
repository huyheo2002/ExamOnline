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

    static public function getConnection(){
        if(static::$connection == null)
        {
            try{
                static::$connection = new PDO(self::DB_TYPE.":host=".self::DB_HOST. ";dbname=" .self::DB_NAME, self::USER_NAME, self::USER_PASSWORD);
            } catch(Exception $exception){
                throw new Exception("connection fail");
            }
        }
        return static::$connection;
    }

    static public function execute($sql, $param = [])
    {
        $statement = DB::getConnection()->prepare($sql);
             
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $result = $statement->execute($param);

        // self::debug($statement);
        if (!$result) {
            // var_dump(self::$connection->errorInfo());
            // die;
            throw new Exception(DB::getConnection()->errorInfo()[2]);
        }
        
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
