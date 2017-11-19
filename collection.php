<?php
    class collection {
        protected $html;
        static public function create() {
            $model = new static::$modelName;
            return $model;
        }
        static function findOne($id) {
            $conn = dbConn::getConnection();
            $tableName = get_called_class();
            $sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $class = static::$modelName;
            $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
            $result = $stmt->fetchAll();
            return $result;
        }
        static function findAll() {
            $conn = dbConn::getConnection();
            $tableName = get_called_class();
            $sql = 'SELECT * FROM '.$tableName;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $class = static::$modelName;
            $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
            $result = $stmt->fetchAll();
            return $result;
        }
    }
?>