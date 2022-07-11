<?php


class DbConnectionSQLServer{

    protected function connect(){
        $connectionInfo = array("Database"=>DB_mssql, 
        "UID"=>USER_mssql, 
        "PWD"=>PASSWORD_mssql, 
        "TrustServerCertificate" => true,
        "CharacterSet" => "UTF-8");
    
        //Para que logre conectar, tengo que colocar una de las dos llaves:
        //"TrustServerCertificate" => true
        // ó
        //"Encrypt" => false
    
        $conn = sqlsrv_connect(HOST_mssql,$connectionInfo);
        if( $conn ) {
            return $conn;
        }else{
            echo "Conexión no se pudo establecer.<br />";
            die( print_r( sqlsrv_errors(), true));
        }
    }

}
/*

Warning: Constant HOST already defined in C:\xampp\htdocs\web-app\includes\config.php on line 2

Warning: Constant USER already defined in C:\xampp\htdocs\web-app\includes\config.php on line 3

Warning: Constant PASSWORD already defined in C:\xampp\htdocs\web-app\includes\config.php on line 4

Warning: Constant DB already defined in C:\xampp\htdocs\web-app\includes\config.php on line 5

Warning: Constant HOST_mssql already defined in C:\xampp\htdocs\web-app\includes\config.php on line 7

Warning: Constant USER_mssql already defined in C:\xampp\htdocs\web-app\includes\config.php on line 8

Warning: Constant PASSWORD_mssql already defined in C:\xampp\htdocs\web-app\includes\config.php on line 9

Warning: Constant DB_mssql already defined in C:\xampp\htdocs\web-app\includes\config.php on line 10

Warning: Constant MYSQL_CODE_DUPLICATE_KEY already defined in C:\xampp\htdocs\web-app\includes\config.php on line 12

*/