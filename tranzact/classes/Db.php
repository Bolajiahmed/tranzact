<?php
require_once "config.php";
Class Db{
    protected function connect(){
        $option=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
        try{
            $dsn="mysql:host=localhost;dbname=".DBNAME;
            $conn=new PDO ($dsn,DBUSER,DBPASS,$option);
            return $conn;

        }
        catch(PDOEXCEPTION $e){
            //$e->getMessage();
            echo"connection failed";
            return false;
        }
    }
}
?>