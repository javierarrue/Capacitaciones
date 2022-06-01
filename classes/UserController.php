<?php
//Error handling
//Manejo de query's - REGISTRO DE USUARIO

class UserController extends User{
    private $firstname;
    private $lastname;
    private $username;
    private $password;
    private $rol;

    public function __construct($firstname, $lastname, $username, $password, $rol)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;
    }

    //Metodo que ejectua los validaciones de los campos del formulario
    public function signUpUser(){
        if(!$this->checkForEmptyInputs()){
            header("location: ../views/admin_usuarios.php?error=Inserte los datos solicitados.");
            exit();
        }
        if(!$this->checkForInvalidUserName()){
            header("location: ../views/admin_usuarios.php?error=Caracteres inválidos. Permitido: a-z, 0-9");
            exit();
        }
        if(!$this->chekcIfUserIsTaken()){
            header("location: ../views/admin_usuarios.php?error=El nombre de usuario ya existe.");
            exit();
        }

        $this->setUser($this->firstname,$this->lastname,$this->username,$this->password, $this->rol);
    }

    //Validar si hay inputs vacios.
    private function checkForEmptyInputs(){

        if(empty($this->firstname) || empty($this->lastname) || empty($this->username) || empty($this->password)){
            echo $this->firstname;
            return false;
        }else{
            return true;
        }

    }

    //Validar si se escribio un usuario con caracteres invalidos.
    private function checkForInvalidUserName(){
        //Caracteres permitidos:
        //Desde la a hasta la z, en mayusculas y minusculas
        //Numeros del 0 al 9.
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->username)){
            return false;
        }else{
            return true;
        }

    }

    //Validar si el usuario ya existe
    private function chekcIfUserIsTaken(){

        //Para validar esto, es necesario ejecutar un query en la BD.
        //Por lo tanto llamo el metodo de checkIfUserExist la clase - SignUp -
        if($this->checkIfUserExist($this->username)){
            return false;
        }else{
            return true;
        }
    }

    public function showUsers(){
        return $this->getUsers();
    }

    public function deleteSelectedUser(){
        $this->deleteUser($this->username);
    }   

}