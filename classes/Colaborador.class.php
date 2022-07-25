<?php

class Colaborador extends DbConnectionSQLServer{
    
    protected function detalleColaborador($cedula){
        $conn = $this->connect();
        $sql = "SELECT nombre, apellido, cedula, ocupacion, departamentos.depto, direcciones.direccion, ocupacion
                FROM personal
                JOIN DEPARTAMENTOS ON personal.C_DEPTO = departamentos.C_DEPTO
                JOIN ocupaciones ON personal.c_ocup = ocupaciones.C_OCUP
                JOIN DIRECCIONES ON personal.C_DIR = direcciones.C_DIR
                where personal.CEDULA = ?";
        $stmt = sqlsrv_prepare( $conn, $sql, array($cedula));

        if( sqlsrv_execute( $stmt ) === false ) {
            $stmt = null;  
            header("location: ../views/visualizar_cargos_trabajadores.php?error=stmtfailed");
            exit();
        }

        return sqlsrv_fetch_array($stmt);
    }

}