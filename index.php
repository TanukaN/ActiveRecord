<?php
//turn on debugging messages
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    class Manage {						//Defining a class with autoload function to attempt to load undefined class - in this case htmlTags class
        public static function autoload($class) {
            include $class . '.php';
        }
    }
    spl_autoload_register(array('Manage', 'autoload'));

    define('SERVERNAME', 'sql2.njit.edu');
    define('USERNAME','tn76');
    define('PASSWORD','DblDTPzb');
    define('DBNAME','tn76');

    class dbConn
    {
        protected static $conn;
        function __construct()
        {
            try {
                self::$conn = new PDO('mysql:host='.SERVERNAME.';dbname='.DBNAME , USERNAME, PASSWORD);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        static function getConnection(){
            if(!self::$conn) {
                new dbConn;
            }
            return self::$conn;
        }
    }

    $obj=new main();

    class main
    {
        public function __construct()
        {
            /**********************************ACCOUNTS TABLE***********************************/
            StringFunctions::printThisInH1('Select One Record From Accounts Table');            //Select One Record
            StringFunctions::printThisInH3('Record with id = 1 is selected');
            $record = accounts::findOne(1);
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();

            StringFunctions::printThisInH1('Select All Records From Accounts Table');           //Select All Records
            $record = accounts::findAll();
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();

            StringFunctions::printThisInH1('Insert New Record in Accounts Table');              //Insert One Record
            $obj = new account();
            $obj->email = "tn76@njit.edu";
            $obj->fname = "Tanuka";
            $obj->lname = "N";
            $obj->phone = "9876543210";
            $obj->birthday = "1990-10-15";
            $obj->gender = "female";
            $obj->password = "12345";
            $newID = $obj->save();
            $record = accounts::findAll();
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();

            StringFunctions::printThisInH1('Update New Record in Accounts Table');              //Update One Record
            StringFunctions::printThisInH3('Updated lname = Nayak where id = ' .$newID);
            $obj = new account();
            $obj->id = $newID;
            $obj->lname = "Nayak";
            $obj->save();
            $record = accounts::findAll();
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();

            StringFunctions::printThisInH1('Delete Record From Accounts Table');                //Delete One record
            $obj = new account();
            $obj->id = $newID;
            $obj->delete();
            StringFunctions::printThisInH3('Record with id = '. $newID .'  is deleted');
            $record = accounts::findAll();
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();

            /**************************************TODOS TABLE***********************************/
            StringFunctions::printThisInH1('Select One Record From Todos Table');               //Select One Record
            StringFunctions::printThisInH3('Record with id = 1 is selected');
            $record = todos::findOne(1);
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();

            StringFunctions::printThisInH1('Select All Records From Todos Table');              //Select All Records
            $record = todos::findAll();
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();

            StringFunctions::printThisInH1('Insert New Record in Todos Table');                //Insert One Record
            $obj = new todo();
            $obj->owneremail = "tn@njit.edu";
            $obj->ownerid = "34";
            $obj->createddate = "2017-11-14 00:00:00";
            $obj->duedate = "2017-11-19 00:00:00";
            $obj->message = "Active Record";
            $obj->isdone = "1";
            $newID = $obj->save();
            $record = todos::findAll();
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();

            StringFunctions::printThisInH1('Update New Record in Todos Table');              //Update One Record
            StringFunctions::printThisInH3('Updated owneremail = tn76@njit.edu where id = ' .$newID);
            $obj = new todo();
            $obj->id = $newID;
            $obj->owneremail = "tn76@njit.edu";
            $obj->save();
            $record = todos::findAll();
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();

            StringFunctions::printThisInH1('Delete Record From Todos Table');                //Delete One record
            $obj = new todo();
            $obj->id = $newID;
            $obj->delete();
            StringFunctions::printThisInH3('Record with id = '. $newID .'  is deleted');
            $record = todos::findAll();
            htmlTable::makeTable($record);
            StringFunctions::horizontalRule();
        }
    }
?>
