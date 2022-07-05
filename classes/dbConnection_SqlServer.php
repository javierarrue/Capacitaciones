<?php
require('../includes/config.php');

class DbConnection{

    protected function connect(){
        $connectionInfo = array("Database"=>DB_mssql, 
        "UID"=>USER_mssql, 
        "PWD"=>PASSWORD_mssql, 
        "TrustServerCertificate" => true);
    
        //Para que logre conectar, tengo que colocar una de las dos llaves:
        //"TrustServerCertificate" => true
        //"Encrypt" => false
    
        $conn = sqlsrv_connect(HOST_mssql,$connectionInfo);
        if( $conn ) {
        echo "Conexión establecida.<br />";
        }else{
        echo "Conexión no se pudo establecer.<br />";
        die( print_r( sqlsrv_errors(), true));
        }
    }

}
/*
        $puerto = '1433';
        try{

            $conn = new PDO("sqlsrv:Server=$host, $puerto; Database=$dbname",$username,$password);
            echo "Conexion exitosa";
            return $conn;

        }catch(PDOException $e){
            print "Error: ".$e->getMessage()."<br/>";
            die();
        }
*/

