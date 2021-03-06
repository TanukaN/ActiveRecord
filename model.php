<?php
    class model {
        protected $tableName;
        protected static $statement;
        public function save() {
            $array = get_object_vars($this);
            unset($array["tableName"]);
            if ($this->id == '') {
                $sql = $this->insert();
            } else {
                $sql = $this->update();
            }
            $db = dbConn::getConnection();
            self::$statement = $db->prepare($sql);
            self::bindValues($array,$this);
            self::$statement->execute();
            $lastId = $db->lastInsertId();
            return ($lastId);
        }

        private static function bindValues($array,$obj) {
            foreach ($array as $key => $value) {
                if ($obj->id == '') {
                    self::$statement->bindValue(":$key", "$value");
                } else {
                    if ($value != '' && $key != "id") {
                        self::$statement->bindValue(":$key", "$value");
                    }
                }
            }
        }

        private function insert() {
            $array = get_object_vars($this);
            unset($array["tableName"]);
            $columnString = implode(',', array_keys($array));
            $valueString  = ":" . implode(',:', array_keys($array));
            $sql          = "INSERT INTO $this->tableName (" . $columnString . ") VALUES (" . $valueString . ")";
            return $sql;
        }

        private function update() {
            $array = get_object_vars($this);
            unset($array["tableName"]);
            $sql = "UPDATE " . $this->tableName . " SET";
            foreach ($array as $key => $value) {
                if ($value != "" & $key != "id") {
                    $sql .= " " . $key . " = :$key ,";
                }
            }
            $sql = substr($sql, 0, -1);
            $sql .= " WHERE id = " . $this->id;
            return $sql;
        }

        public function delete() {
            $array = get_object_vars($this);
            $sql = "DELETE FROM " . $this->tableName . " WHERE id = " . $this->id;
            $db = dbConn::getConnection();
            self::$statement = $db->prepare($sql);
            self::$statement->execute();
        }
    }
?>
