<?php
//Error handling- REGISTRO DE USUARIO
//Controlador, maneja las peticiones y se comunica con el modelo para recibir la informacion solicitada

class UserController extends User{
    private $firstname;
    private $lastname;
    private $username;
    private $password1;
    private $password2;
    private $rol;
    private $user_id;

    public function __construct($firstname, $lastname, $username, $password1, $password2, $rol, $user_id)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->password1 = $password1;
        $this->password2 = $password2;
        $this->rol = $rol;
        $this->user_id = $user_id;
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

        if(!$this->checkPasswordMatch()){
            header("location: ../views/admin_usuarios.php?error=Las contraseñas deben coincidir.");
            exit();
        }

        $this->setUser($this->firstname,$this->lastname,$this->username,$this->password, $this->rol);
    }

    //Validar si hay inputs vacios.
    private function checkForEmptyInputs(){

        if(empty($this->firstname) || empty($this->lastname) || empty($this->username) || empty($this->password1) || empty($this->password2)){
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

    private function checkPasswordMatch(){
        if($this->password1 != $this->password2){
            return false;
        }
        return true;
    }

    public function showUsers(){
        return $this->getUsers();
    }

    public function deleteSelectedUser(){
        $this->deleteUser($this->username);
    }

    public function editSelectedUser(){
        $this->editUser($this->user_id, $this->username, $this->firstname, $this->lastname, $this->rol);
    }

    public function changeUserPassword(){
        if($this->checkPasswordMatch()){
            $this->changePassword($this->password1, $this->user_id);
        }
        header("location: ../views/admin_usuarios.php?error=Las contraseñas deben coincidir.");
        exit();
    }

}