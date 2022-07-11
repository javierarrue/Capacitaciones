<?php
class CSugeridos extends DbConnection{
    protected function insertarNuevosCursos($cedula, $c_cargo, $c_dir, $c_dep, $cursos){
        //La idea es la siguiente:
        /**
         * Recibir la lista de cursos.
         * Insertar la lista de cursos en la tabla cursos sugeridos de la bd.
         * Al insertar, validar que no hayan cursos sugeridos con nombres repetidos.
         * Para lograr esta validacion, probablemente tengo que insertar cada curso, uno por uno.
         */


         //Primero: insertar cursos en la tabla curso_sugerido de la BD

         foreach($cursos as $curso=>$analisis){
            
            echo "Insertando Curso: $curso ";
            
            try{
                $stmt = $this->connect()->prepare("INSERT INTO curso_sugerido (nombre) VALUES (?)");
                if(!$stmt->execute(array($curso))){
                    $stmt = null;  
                    header("location: ../views/admin_usuarios.php?error=stmtfailed");
                    exit();
                }
            }catch(\PDOException $e) {
                if ($e->errorInfo[1] == MYSQL_CODE_DUPLICATE_KEY) {
                    //The INSERT query failed due to a key constraint violation.
                    echo "Ya existe un curso con el nombre: $curso";
                }
            }
        }


    }
}