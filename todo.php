<?php
    class todo extends model {
        public $owneremail = 'owneremail';
        public $ownerid = 'ownerid';
        public $createddate = 'createddate';
        public $duedate = 'duedate';
        public $message = 'message';
        public $isdone = 'isdone';
        protected static $dataToInsert = array('tn@njit.edu','34','11/09/2017','12/25/2018','Active Record','1');
        public static $tableName = 'todos';
        public static $columnToUpdate = 'owneremail';
        public static $updateData = 'tn76@njit.edu';
    }
?>