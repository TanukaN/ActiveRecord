<?php
    class account extends model {
        public $email = 'email';
        public $fname = 'fname';
        public $lname = 'lname';
        public $phone = 'phone';
        public $birthday = 'birthday';
        public $gender = 'gender';
        public $password = 'password';
        protected static $dataToInsert = array('tn76@njit.edu','Tanuka','N','9876543210','10-15-1990','female','12345');
        public static $tableName = 'accounts';
        public static $columnToUpdate = 'lname';
        public static $updateData = 'Nayak';
    }
?>