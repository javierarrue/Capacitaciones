<?php
include "formatCedula.class.php";

    class Cargos extends DbConnectionSQLServer{

        protected function getCharges(/*$c_dir,*/$c_depto){
            $result = array();
            $conn = $this->connect();
            $sql = "SELECT nombre, apellido, cedula, ocupacion, ocupaciones.C_OCUP, departamentos.depto, direcciones.direccion
                    FROM personal
                    JOIN DEPARTAMENTOS ON personal.C_DEPTO = departamentos.C_DEPTO
                    JOIN ocupaciones ON personal.c_ocup = ocupaciones.C_OCUP
                    JOIN DIRECCIONES ON personal.C_DIR = direcciones.C_DIR
                    where departamentos.C_DEPTO = ?";

            $stmt = sqlsrv_prepare( $conn, $sql, array( /*&$c_dir,*/&$c_depto));
            
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

            $i = 0;

            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                $obj = new formatCedula($row['cedula']);

                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $cedulaConGuiones = $obj->formatCedula();
                $cedulaSinGuiones = $row['cedula'];
                $cargo = $row['ocupacion'];
                $c_ocup = $row['C_OCUP'];
                $depto = $row['depto'];
                $direccion = $row['direccion'];

                $result[$i] = array(
                    "nombre" => $nombre, 
                    "apellido" => $apellido, 
                    "cedula" => $cedulaConGuiones, 
                    "cargo" => $cargo,
                    "C_OCUP" => $c_ocup,
                    "btn_detalle" => "
                        <form target='_blank' action='../views/visualizar_detalles.php' method='GET'>
                            <button type='submit' class='text-primary action-btn' title='Ver detalles'>
                            <i class='bi bi-search'></i></button>
                            <input type='hidden' value='$cedulaSinGuiones' name=cedula>
                        </form>"
                );
                $i++;
            }
            return $result;
        }
    }