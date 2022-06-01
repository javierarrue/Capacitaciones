<?php
//Manejo de querys - USUARIOS
class Users extends DbConnection{

    public function getUsers(){
        $stmt = $this->connect()->prepare("SELECT * FROM user;");

        if(!$stmt->execute()){
            $stmt = null;  
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }

        return $stmt;
    }

    public function deleteUser(){
        $stmt = $this->connect()->prepare("DELETE * FROM user;");
        
        if(!$stmt->execute()){
            $stmt = null;  
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }
    }

}