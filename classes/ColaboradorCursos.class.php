<?php
class ColaboradorCursos extends DbConnection{

    protected function obtenerCursosSugeridosTrabajador($cedula){
        $detallesCursos = array();
        $db = $this->connect();
        $stmt = $db->prepare("SELECT * FROM csugerido_cargo_trabajador where ced_trabajador = ?;");

        if(!$stmt->execute(array($cedula))){
            $stmt = null;  
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }

        $i = 0;
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $stmt2 = $db->prepare("SELECT * FROM curso_sugerido where id = ?;");
            
            if(!$stmt2->execute(array($result["id_curso_sugerido"]))){
                $stmt2 = null;  
                header("location: ../views/admin_usuarios.php?error=stmtfailed");
                exit();
            }
            $cursoSugerido = $stmt2->fetch(PDO::FETCH_ASSOC);
            
            $detallesCursos[$i] = array(
                "csugerido" => $cursoSugerido["nombre"],
                "analisis" => $result["analisis"],
                "estado" => $result["id_estado"],
                "fecha_inicio" => $result["fecha_inicio"],
                "fecha_fin" => $result["fecha_fin"]
            );
            $i++;
        }
        
        return $detallesCursos;
    }
}