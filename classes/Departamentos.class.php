<?php
    class Departamentos extends DbConnectionSQLServer{
        //Consultar direcciones de la AMP
        protected function getDepartments($c_direccion){
            $result = array();
            $conn = $this->connect();
            $sql = "SELECT * FROM departamentos where C_DIR = ?";

            $stmt = sqlsrv_prepare( $conn, $sql, array( &$c_direccion));
            
            //$stmt = sqlsrv_query($conn, $sql);

            if(!$stmt){
                $stmt = null;  
                header("location: ../views/registrar_sugerido.php?error=stmtfailed");
                exit();
            }

            if( sqlsrv_execute( $stmt ) === false ) {
                $stmt = null;  
                header("location: ../views/registrar_sugerido.php?error=stmtfailed");
                exit();
            }

            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

                $departamento = $row['DEPTO'];
                $c_depto = $row['C_DEPTO'];

                $result[$departamento] = $c_depto;
                
            }
            return $result;

        }
    }