<?php 

require_once "./app/DB.php";

class BaseModel 
{
    static protected $table;

    static protected $attributes;
    
    /**
     * Lấy toàn bộ bản ghi
     * @return array
     */
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

    /**
     * Lấy bản ghi vừa được insert. Nếu không dùng liền với create thì sẽ fail :v
     * @return null|Model
     */
    static public function lastInserted()
    {
        $sql = "SELECT * FROM `".static::$table."` WHERE (`id` = LAST_INSERT_ID())"; 
        $result = DB::execute($sql);

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

    /**
     * Tạo bản ghi mới với $data.
     * Trả về bản ghi vừa tạo
     * @return null|Model
     */
    static public function create(array $data)
    {
        $columns = array_map(fn($attribute) => "`".$attribute."`", static::$attributes);
        $valueColumns = array_map(fn($attribute) => ":".$attribute, static::$attributes);
        $data["id"] = $data["id"] ?? null;
        $data["created_at"] = $data["created_at"] ?? null;
        $data["updated_at"] = $data["updated_at"] ?? null;
        
        $sql = "INSERT INTO `".static::$table."`(" . implode(",", $columns) . ")";
        $sql .= " VALUES (" . implode(", ", $valueColumns) . ")";
        
        try {
            DB::execute($sql, $data);

            return static::lastInserted();
        } catch (Exception $e) {
            dd($e);

            return null;
        }
    }

    /**
     * Cập nhật bản ghi có id = $id với $data 
     * Trả về bản ghi vừa cập nhật
     * @return null|Model
     */
    static public function update(array $data, $id)
    {
        $columns = array_diff(static::$attributes, ['id', 'created_at', 'updated_at']);
        $tempArr = array_map(fn($col) => "`".$col."` = :".$col, $columns);
        
        $sql = "UPDATE " . static::$table;
        $sql .= " SET " . implode(", ", $tempArr);
        $sql .= " WHERE (`id` = :id)";

        $data["id"] = $id;

        try {
            $result = DB::execute($sql, $data);

            return static::find($id);
        } catch (Exception $e) {
            dd($e);

            return null;
        }
    }
    
    /**
     * Tìm bản ghi đầu tiên thoả mãn điều kiện
     * @return null|Model
     */
    static public function firstWhere(string $attribute, string $operator, $value) 
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

    /**
     * Tìm tất cả bản ghi thoả mãn điều kiện
     * @return null|array
     */
    static public function allWhere(string $attribute, string $operator, $value) 
    {
        
        $sql = "SELECT * FROM `".static::$table."` WHERE (`". $attribute ."` ".$operator." :".$attribute.")";
        
        $result = DB::execute($sql, [$attribute => $value]);
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

    /**
     * Tìm bản ghi đầu tiên có id là $id
     * @return null|Model
     */
    static public function find($id) 
    {
        return static::firstWhere("id", "=", $id);
    }
    
    /**
     * Xoá tất cả bản ghi có id là $id
     * @return bool
     */
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

    // Relationships

    /**
     * Liên kết 1 nhiều: Đầu 1
     * @return array
     */
    public function hasMany(string $className, string $primaryKey, string $foreignKey)
    {
        if (!isset($this->$primaryKey)) {
            return [];
        }
        
        return $className::allWhere($foreignKey, "=", $this->$primaryKey);
    }

    /**
     * Liên kết 1 nhiều: Đầu nhiều
     * @return null|Model
     */
    public function belongsTo(string $className, string $foreignKey, string $primaryKey)
    {   
        if (!isset($this->$foreignKey)) {
            return null;
        }
        
        return $className::firstWhere($primaryKey, "=", $this->$foreignKey);
    }

    /**
     * Liên kết nhiều nhiều: Thông qua bảng trung gian thông qua id
     * @return array
     */
    public function belongsToMany(string $className, string $intermediateTable, string $myForeignKey, string $theirForeignKey)
    {
        if (!isset($this->id)) {
            return [];
        }

        $theirTable = $className::$table;

        $sql = "SELECT `".$theirTable."`.*";
        $sql .= " FROM `".$intermediateTable."`, `".$theirTable."`";
        $sql .= " WHERE (`".$intermediateTable."`.`".$theirForeignKey."` = `".$theirTable."`.`id` AND `".$intermediateTable."`.`".$myForeignKey."` = :id)";

        $result = DB::execute($sql, [
            'id' => $this->id,
        ]);        
        if (empty($result)) {
            return [];
        } 
        
        $collection = array_map(function($record) use ($className) {
            $obj = new $className;
            foreach($className::$attributes as $attribute) {
                $obj->$attribute = $record[$attribute];
            }

            return $obj;
        }, $result);
        
        return $collection;
    }

    // Bảng trung gian

    /**
     * Tạo bản ghi cho bảng trung gian
     * @return bool
     */
    public function sync(string $intermediateTable, string $myForeignKey, string $theirForeignKey, array $data)
    {
        if (!isset($this->id)) {
            return false;
        }

        $sql = "DELETE FROM `".$intermediateTable."` WHERE (`".$myForeignKey."` = :id)";
        try {
            DB::execute($sql, [
                "id" => $this->id
            ]);
        } catch (Exception $e) {
            dd($e);

            return false;
        }

        $sql = "INSERT INTO `".$intermediateTable."` (`".$myForeignKey."`, `".$theirForeignKey."`, `created_at`, `updated_at`) VALUES (:".$myForeignKey.", :".$theirForeignKey.", null, null)";
        foreach($data as $theirId) {
            try {
                DB::execute($sql, [
                    $myForeignKey => $this->id,
                    $theirForeignKey => $theirId,
                ]);
            } catch (Exception $e) {
                dd($e);
                
                return false;
            }
        }

        return true;
    }
}