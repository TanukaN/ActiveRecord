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

    /**********************************ACCOUNTS TABLE***********************************/
    StringFunctions::printThisInH1('Select One Record From Accounts Table');            //Select One Record
    StringFunctions::printThisInH3('Record with id = 1 is selected');
    $record = accounts::findOne(1);
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();

    StringFunctions::printThisInH1('Select All Records From Accounts Table');           //Select All Records
    $record = accounts::findAll();
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();

    $id=60;
    StringFunctions::printThisInH1('Delete Record From Accounts Table');                //Delete One record
    $record = new account();
    $record->delete($id);
    StringFunctions::printThisInH3('Record with id = '.$id.' is deleted');
    $record = accounts::findAll();
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();

    StringFunctions::printThisInH1('Insert New Record in Accounts Table');              //Insert One Record
    $obj = new Account;
    $obj->save('');
    $record = accounts::findAll();
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();

    $id=61;
    StringFunctions::printThisInH1('Update New Record in Accounts Table');              //Update One Record
    StringFunctions::printThisInH3('Updated lname = Nayak where id = '.$id);
    $obj->save($id);
    $record = accounts::findAll();
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();

    /**************************************TODOS TABLE***********************************/
    StringFunctions::printThisInH1('Select One Record From Todos Table');               //Select One Record
    StringFunctions::printThisInH3('Record with id = 1 is selected');
    $record = todos::findOne(1);
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();

    StringFunctions::printThisInH1('Select All Records From Todos Table');              //Select All Records
    $record = todos::findAll();
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();

    $id=37;
    StringFunctions::printThisInH1('Delete Record From Todos Table with id = ' .$id);   //Delete One Record
    $record = new todo();
    $record->delete($id);
    StringFunctions::printThisInH3('Record with id = '.$id.' is deleted');
    $record = todos::findAll();
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();

    StringFunctions::printThisInH1('Insert New Record in Todos Table');                 //Insert One Record
    $obj = new todo();
    $obj->save('');
    $record = todos::findAll();
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();

    $id=38;
    StringFunctions::printThisInH1('Update New Record in Todos Table');                 //Update One Record
    StringFunctions::printThisInH3('Updated owneremail = tn76@njit.edu where id = '.$id);
    $obj->save($id);
    $record = todos::findAll();
    $record = htmlTable::makeTable($record);
    StringFunctions::horizontalRule();
?>
