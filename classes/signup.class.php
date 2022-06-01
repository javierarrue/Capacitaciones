<?php
//Clase para el manejo query's - REGISTRO DE USUARIO
//Esta *Exitende* de la clase DbConnection, para poder realizar la conexion a la Base de datos
//y a si realizar los querys necesarios.
class Signup extends DbConnection{
    
    //Validar si el usuario ha registrar ya existe.
    protected function checkIfUserExist($username){
        //Preparacion del query.
        $stmt = $this->connect()->prepare("SELECT user FROM user WHERE user = ?;");

        //Ejecucion del query.
        if(!$stmt->execute(array($username))){
            $stmt = null;  
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }

        $resultCheck = false;

        //Si el usuario YA EXISTE, true
        if($stmt->rowCount() > 0){
            $resultCheck = true;
        }else{ //Si NO EXISTE, false
            $resultCheck = false;
        }

        return $resultCheck;
    }

    //Registrar un nuevo usuario al sistema
    protected function setUser($firstname,$lastname,$username, $password,$rol){
        $stmt = $this->connect()->prepare("INSERT INTO user (firstname, lastname, user, password, rol_id) VALUES (?,?,?,?,?);");

        //Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //Ejecucion del query.
        if(!$stmt->execute(array($firstname, $lastname, $username,$hashedPassword, $rol))){
            $stmt = null;  
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }

        $stmt = null;  
    }


}