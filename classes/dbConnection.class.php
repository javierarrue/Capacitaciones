<?php
class DbConnection{

    protected function connect(){
        try{

            $conn = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASSWORD);
            return $conn;

        }catch(PDOException $e){
            print "Error: ".$e->getMessage()."<br/>";
            die();
        }
    }

}