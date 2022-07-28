<?php
class ColaboradorCursos extends DbConnection
{

    protected function obtenerCursosSugeridosTrabajador($cedula)
    {
        $detallesCursos = array();
        $db = $this->connect();
        $stmt = $db->prepare("SELECT * FROM csugerido_cargo_trabajador where ced_trabajador = ?;");

        if (!$stmt->execute(array($cedula))) {
            $stmt = null;
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }

        $i = 0;
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $stmt2 = $db->prepare("SELECT * FROM curso_sugerido where id = ?;");

            if (!$stmt2->execute(array($result["id_curso_sugerido"]))) {
                $stmt2 = null;
                header("location: ../views/admin_usuarios.php?error=stmtfailed");
                exit();
            }
            $cursoSugerido = $stmt2->fetch(PDO::FETCH_ASSOC);

            $detallesCursos[$i] = array(
                "id" => $result["id"],
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

    protected function eliminarCSugeridoTrabajador($id)
    {
        $stmt = $this->connect()->prepare("DELETE FROM csugerido_cargo_trabajador WHERE id = ?;");

        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }
    }

    protected function editarCSugeridoTrabajador($datos)
    {
        //TENER CUIDADO CON EL NOMBRE DEL CURSO, DEBE SER UNICO
        $stmt = $this->connect()->prepare("UPDATE csugerido_cargo_trabajador SET id_estado = ?, fecha_inicio = ?, fecha_fin = ?, analisis = ? WHERE id = ?;");

        if (!$stmt->execute(array($datos["estado"], $datos["fecha_inicio"], $datos["fecha_fin"], $datos["analisis"], $datos["id"]))) {
            $stmt = null;
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }
    }
}
