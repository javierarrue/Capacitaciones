<?php
//Manejo de query's - INICIO DE SESION

use LDAP\Result;

class Login extends DbConnection{

    //Esta funcion procesa el login al sistema.
    //Tomar en cuenta:
    //1. Primero se consulta si el usuario existe en la bd.
    //2. Si el usuario es encontrado, entonces se verifica si la contaseña insertada es correcta.
    //3. La contraseña se verifica usando la funcion password_verify(), la cual es propia del PHP.
    //.. Se verifica de esta manera, porque al registrar un nuevo usuario, la contraseña fue creada usando la funcion password_hash() y no md5().
    protected function getUser($username, $password){

        //Consulta el usuario a la base de datos.
        $stmt = $this->connect()->prepare("SELECT * FROM user WHERE user = ?");
        //SI ocurre algun error.
        if(!$stmt->execute(array($username))){
            $stmt = null;
            header ("location: ../views/index.php?error=stmtError");
            exit();
        }
        //Verificar si encontro algun resultado:
        if($stmt->rowCount() == 0){
            //Si no existe el usuario, devolver con error.
            $stmt = null;
            header ("location: ../views/index.php?error=Datos incorrectos. Intente nuevamente.");
            exit();
        }
        //SI existe, almacenar datos en arreglo asociativo.
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        //Se usa password_verify() de php para comparar la contraseña entrante 
        //con la guardada en la bd.
        if(password_verify($password, $result["password"])){
            //Creacion de variables de sesion
            session_start();

            $stmt2 = $this->connect()->prepare("SELECT rol_name FROM rol WHERE id = ?");

            if(!$stmt2->execute(array($result["rol_id"]))){
                $stmt = null;
                header ("location: ../views/index.php?error=stmtError");
                exit();
            }

            $rol = $stmt2->fetch(PDO::FETCH_ASSOC);
        
            $_SESSION["user_id"] = $result["id"];
            $_SESSION["username"] = $result["user"];
            $_SESSION["firstname"] = $result["firstname"];
            $_SESSION["lastname"] = $result["lastname"];
            $_SESSION["rol"] = $rol["rol_name"];

            $stmt = null;
        }else{
            
            $stmt = null;
            header ("location: ../views/index.php?error=Datos incorrectos. Intente nuevamente.");
            exit();
        }
    }
}