<?php 

require_once "./app/DB.php";

class BaseModel 
{
    static protected $table;

    static protected $attributes;
    
    static public function all()
    {
        $sql = "SELECT * FROM `".static::$table."`";

        return DB::execute($sql);
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
        
        $result = DB::execute($sql, $data);
    }

    static public function update($data, $id)
    {
        $columns = array_diff(static::$attributes, ['id', 'created_at', 'updated_at']);
        $tempArr = array_map(fn($col) => "`".$col."` = :".$col, $columns);
        
        $sql = "UPDATE " . static::$table;
        $sql .= " SET " . implode($tempArr);
        $sql .= " WHERE (`id` = :id)";

        $data["id"] = $id;

        return DB::execute($sql, $data);   
    }

    static public function find($id) 
    {
        $sql = "SELECT * FROM `".static::$table."` WHERE (`id` = :id)";
        
        return DB::execute($sql, ["id" => $id])[0];
    }

    static public function destroy($id) 
    {
        $sql = "DELETE FROM `".static::$table."` WHERE (`id` = :id)";

        try {
            DB::execute($sql, ["id" => $id]);

            return true;
        } catch (Exception) {
            return false;
        }
    }
}