<?php
    class Direcciones extends DbConnectionSQLServer{
        //Consultar direcciones de la AMP
        protected function getDirections(){
            $result = array();
            $conn = $this->connect();

            $stmt = sqlsrv_query($conn,"SELECT * FROM direcciones");

            if($stmt === false){
                $stmt = null;  
                header("location: ../views/admin_usuarios.php?error=stmtfailed");
                exit();
            }

            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

                $direccion = $row['DIRECCION'];
                $c_dir = $row['C_DIR'];

                $result[$direccion] = $c_dir;
                
            }

            return $result;

        }
    }