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

    //Añade nuevos estados a la tabla Estados
    //Recibe un arreglo[], con n cantidad de elementos.
    protected function setNewStatus($status){
        $values = [];
        
        for($i= 0 ; $i<count($status); $i++){
            //Inserto el elemento (?) como un String. La cantidad sera en base al tamaño del arreglo $status.
            $values[$i] = '(?)';
        }
        //Utilizo la funcion implode(), la cual convierte los elementos de un arreglo a un String. Defino los separadores como una coma ( , ). 
        $stmt = $this->connect()->prepare("INSERT INTO estados (estado) VALUES ". implode(',', $values) .";");
        
        if(!$stmt->execute($status)){
            $stmt = null;  
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }
    }

    protected function deleteStatus($statusId){
        $stmt = $this->connect()->prepare("DELETE FROM estados WHERE id_estado = ?;");

        if(!$stmt->execute(array($statusId))){
            $stmt = null;  
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }
    }

    protected function editEstado( $statusId,$status){
        $stmt = $this->connect()->prepare("UPDATE estados SET estado = ? WHERE id_estado = ?;");

        if(!$stmt->execute(array( $status,$statusId))){
            $stmt = null;  
            header("location: ../views/admin_usuarios.php?error=stmtfailed");
            exit();
        }        
    }
}