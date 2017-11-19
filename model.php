<?php
    class model {
        static $tableName;
        static $key;
        static $value;
        public function save($id) {
            self::$tableName = static::$tableName;
            if (empty($id) ) {
                $array = get_object_vars($this);
                self::$key = implode(', ', $array);
                self::$value = implode(', ', array_fill(0, count($array), '?'));
                $sql = $this->insert(self::$tableName, self::$key, self::$value);
                $conn = dbConn::getConnection();
                $stmt = $conn->prepare($sql);
                $stmt->execute(static::$dataToInsert);
            }
            else {
                $sql = $this->update(self::$tableName,static::$columnToUpdate, static::$updateData,$id);
                $conn = dbConn::getConnection();
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            }
        }
        private function insert($tableName,$key,$value) {
            $sql = "INSERT INTO ".$tableName." (".$key.") VALUES (".$value.")";
            return $sql;
        }
        private function update($tableName,$column,$value,$id) {
            $sql = "UPDATE ".$tableName." SET ".$column." = '".$value."' WHERE id=" .$id;
            return $sql;
        }
        public function delete($id) {
            $conn = dbConn::getConnection();
            $sql = "DELETE from ".static::$tableName." WHERE id=".$id;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }
?>