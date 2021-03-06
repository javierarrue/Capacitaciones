<?php
class CRequerido extends DbConnection
{

    protected function setNewCourse($cursos)
    {
        $values = [];

        for ($i = 0; $i < count($cursos); $i++) {
            $values[$i] = '(?)';
        }

        //echo implode(',', $values);

        $stmt = $this->connect()->prepare("INSERT INTO curso_requerido (name) VALUES " . implode(',', $values) . ";");

        //Insertar en la tabla: crequerido_cargo. Nota: ademas de guardar el id del cargo, tambien guardar el id del departamento.

        if (!$stmt->execute($cursos)) {
            $stmt = null;
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }
    }

    protected function getCourses()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM curso_requerido;");

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }

        return $stmt;
    }
}
