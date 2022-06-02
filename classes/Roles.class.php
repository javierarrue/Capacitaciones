<?php
    class Roles extends DbConnection{

        protected function getRoles(){
            $stmt = $this->connect()->prepare("SELECT * FROM rol;");

            if(!$stmt->execute()){
                $stmt = null;  
                header("location: ../views/admin_usuarios.php?error=stmtfailed");
                exit();
            }
    
            return $stmt;
        }
    }