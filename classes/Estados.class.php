<?php
class Estados extends DbConnection{

    protected function getEstados(){
        $stmt = $this->connect()->prepare("SELECT * FROM estados;");

        if(!$stmt->execute()){
            $stmt = null;  
            header("location: ../views/admin_estados.php?error=stmtfailed");
            exit();
        }

        return $stmt;

    }
}