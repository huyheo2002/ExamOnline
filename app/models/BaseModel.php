<?php 

require_once "./app/DB.php";

class BaseModel 
{
    static protected $table;

    static protected $attributes;
    
    static public function all()
    {
        $sql = "SELECT * FROM `".static::$table."`";

        $result = DB::execute($sql);
        
        $collection = array_map(function($record) {
            $obj = new static;
            foreach(static::$attributes as $attribute) {
                $obj->$attribute = $record[$attribute];
            }
            return $obj;
        }, $result);

        return $collection;
    }

    static public function create($data)
    {
        $columns = static::$attributes;
        $valueColumns = array_map(fn($attribute) => ":".$attribute, $columns);
        $data["id"] = $data["id"] ?? null;
        $data["created_at"] = $data["created_at"] ?? null;
        $data["updated_at"] = $data["updated_at"] ?? null;
        
        $sql = "INSERT INTO `".static::$table."`(" . implode(",", $columns) . ")";
        $sql .= " VALUES (" . implode(", ", $valueColumns) . ")";
        
        try {
            $result = DB::execute($sql, $data);

            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    static public function update($data, $id)
    {
        $columns = array_diff(static::$attributes, ['id', 'created_at', 'updated_at']);
        $tempArr = array_map(fn($col) => "`".$col."` = :".$col, $columns);
        
        $sql = "UPDATE " . static::$table;
        $sql .= " SET " . implode($tempArr);
        $sql .= " WHERE (`id` = :id)";

        $data["id"] = $id;

        try {
            $result = DB::execute($sql, $data);

            return true;
        } catch (Exception $e) {

            return false;
        }
    }
    
    static public function firstWhere($attribute, $operator, $value) 
    {
        $sql = "SELECT * FROM `".static::$table."` WHERE (`". $attribute ."` ".$operator." :".$attribute.")";
        
        $result = DB::execute($sql, [$attribute => $value]);
        if (empty($result)) {
            return null;
        } 
        
        $record = $result[0];
        $obj = new static;
        foreach(static::$attributes as $attribute) {
            $obj->$attribute = $record[$attribute];
        }
        return $obj;
    }

    static public function allWhere($attribute, $operator, $value) 
    {
        
        $sql = "SELECT * FROM `".static::$table."` WHERE (`". $attribute ."` ".$operator." :".$attribute.")";
        
        $result = DB::execute($sql, [$attribute => $value]);
        if (empty($result)) {
            return null;
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

    static public function find($id) 
    {
        return static::firstWhere("id", "=", $id);
    }
    
    static public function destroy($id) 
    {
        $sql = "DELETE FROM `".static::$table."` WHERE (`id` = :id)";

        try {
            DB::execute($sql, ["id" => $id]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}