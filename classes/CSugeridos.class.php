<?php
class CSugeridos extends DbConnection{
    
    protected function insertarNuevosCursos($cedula, $c_cargo, $c_dir, $c_dep, $cursos){
         //Insertar cursos en la tabla curso_sugerido de la BD
         foreach($cursos as $curso=>$analisis){
            try{
                //Insertar en tabla curso_sugerido
                $db = $this->connect();
                $stmt = $db->prepare("INSERT INTO curso_sugerido (nombre) VALUES (?)");
                if(!$stmt->execute(array($curso))){
                    $stmt = null;  
                    header("location: ../views/admin_usuarios.php?error=stmtfailed");
                    $id_curso = 0;
                    exit();
                }
                //Conseguir id autogenerado por la BD, del curso insertado
                $id_curso = $db->lastInsertId();

                //Luego insertar en tabla csugerido_cargo_trabajador
                $stmt = $this->connect()->prepare("INSERT INTO csugerido_cargo_trabajador (id_curso_sugerido, id_cargo, ced_trabajador, id_estado, analisis) VALUES (?,?,?,?,?)");
                if(!$stmt->execute(array($id_curso, $c_cargo, $cedula, 15, $analisis))){
                    $stmt = null;  
                    header("location: ../views/admin_usuarios.php?error=stmtfailed");
                    exit();
                }

            }catch(PDOException $e) {
                 //Si ya existe el curso, entonces buscarlo en la tabla curso_sugerido por su nombre y almacenar su id
                if ($e->errorInfo[1] == MYSQL_CODE_DUPLICATE_KEY) {
                    $stmt = $db->prepare("SELECT * FROM curso_sugerido where nombre = ?;");

                    if(!$stmt->execute(array($curso))){
                        $stmt = null;  
                        header("location: ../views/registrar_sugerido.php?error=stmtfailed");
                        exit();
                    }
                    //Almacenar id del curso
                    $result =  $stmt->fetch(PDO::FETCH_ASSOC);
                    $id_curso = $result["id"];

                    //Luego insertar en tabla csugerido_cargo_trabajador
                    $stmt = $db->prepare("INSERT INTO csugerido_cargo_trabajador (id_curso_sugerido, id_cargo, ced_trabajador, id_estado, analisis) VALUES (?,?,?,?,?)");
                    if(!$stmt->execute(array($id_curso, $c_cargo, $cedula, 15, $analisis))){
                        $stmt = null;  
                        header("location: ../views/admin_usuarios.php?error=stmtfailed");
                        exit();
                    }
                }
            }
        }
    }

    protected function obtenerTodosLosCursos(){
       $stmt = $this->connect()->prepare("SELECT * FROM rol;");

        if(!$stmt->execute()){
            $stmt = null;  
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }

        return $stmt;
    }
}

/**
 * Javier Arrue 

SISTEMA DE CURSOS SUGERIDOS
 INICIO
REGISTRAR
 CURSOS SUGERIDOS
VISUALIZAR
 CARGOS
ADMINISTRAR
 USUARIOS
 CURSOS REQUERIDOS
 ESTADOS

Fatal error: Uncaught Error: Call to a member function prepare() on resource in C:\xampp\htdocs\web-app\classes\CSugeridos.class.php:55 Stack trace: #0 C:\xampp\htdocs\web-app\classes\CSugeridosController.php(18): CSugeridos->xd() #1 C:\xampp\htdocs\web-app\includes\cursosSugeridos.inc.php(11): CSugeridosController->mostrarTodosLosCursos() #2 C:\xampp\htdocs\web-app\views\registrar_sugerido.php(2): include('C:\\xampp\\htdocs...') #3 {main} thrown in C:\xampp\htdocs\web-app\classes\CSugeridos.class.php on line 55
 */