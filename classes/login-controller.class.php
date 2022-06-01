<?php
//Manejo de query's - INICIO DE SESION
class LoginController extends Login{
    private $username;
    private $password;
 

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    //Metodo que ejectua los validaciones de los campos del formulario
    public function loginUser(){
        if(!$this->checkForEmptyInputs()){
            header("location: ../views/index.php?error=Inserte los datos solicitados.");
            exit();
        }
        $this->getUser($this->username, $this->password);
    }

    //Validar si hay inputs vacios.
    private function checkForEmptyInputs(){

        if(empty($this->username) || empty($this->password)){
            return false;
        }else{
            return true;
        }

    }

    //Validar si se escribio un usuario con caracteres invalidos.


}