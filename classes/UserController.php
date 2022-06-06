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
        if(!$this->checkForEmptyInputs($this->username,$this->password1,$this->password2)){
            header("location: ../views/admin_usuarios.php?errorRegister=Inserte los datos solicitados.");
            exit();
        }
        if(!$this->checkForInvalidUserName($this->username)){
            header("location: ../views/admin_usuarios.php?errorRegister=Caracteres inválidos. Permitido: a-z, 0-9");
            exit();
        }
        if(!$this->chekcIfUserIsTaken($this->username)){
            header("location: ../views/admin_usuarios.php?errorRegister=El nombre de usuario ya existe.");
            exit();
        }

        if(!$this->checkPasswordMatch()){
            header("location: ../views/admin_usuarios.php?errorRegister=Las contraseñas deben coincidir.");
            exit();
        }

        $this->setUser($this->firstname,$this->lastname,$this->username,$this->password1, $this->rol);
    }

    //Validar si hay inputs vacios.
    private function checkForEmptyInputs($username,$password1,$password2){

        if(empty($this->firstname) || empty($this->lastname) || empty($username) || empty($password1) || empty($password2)){
            return false;
        }else{
            return true;
        }

    }

    //Validar si se escribio un usuario con caracteres invalidos.
    private function checkForInvalidUserName($username){
        //Caracteres permitidos:
        //Desde la a hasta la z, en mayusculas y minusculas
        //Numeros del 0 al 9.
        if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            return false;
        }else{
            return true;
        }

    }

    //Validar si el usuario ya existe
    private function chekcIfUserIsTaken($user_name){

        //Para validar esto, es necesario ejecutar un query en la BD.
        //Por lo tanto llamo el metodo de checkIfUserExist la clase - SignUp -
        if($this->checkIfUserExist($user_name)){
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

    //VALIDAR -> SI EL USUARIO SE LLAMA -javier-, Y SOLO VA A CAMBIBAR SU ROL u OTRO CAMPO QUE NO SEA SU USUARIO..
    //EL USUARIO QUE SE ENVIARA SERA TAMBIEN -javier- (el que actualmente posee), POR LO TANTO DARA ERROR DE:
    //YA EXISTE UN USUARIO CON ESE NOMBRE
    public function editSelectedUser(){

        if(!$this->checkForEmptyInputs($this->username["username_new"],".",".")){
            //echo $this->username["username_new"];
            header("location: ../views/admin_usuarios.php?errorEdit=Inserte los datos solicitados.&user=".$this->username["username_old"]);
            exit();
        }

        if(!$this->checkForInvalidUserName($this->username["username_new"])){
            header("location: ../views/admin_usuarios.php?errorEdit=Caracteres inválidos. Permitido: a-z, 0-9&user=".$this->username["username_old"]);
            exit();
        }

        //Si el usuario nuevo es el mismo del que ya tiene almacenado en la BD:
        //Bypass la validacion de si checkIfUserIsTaken().
        if($this->compareNewandOldUserNames()){
            $this->editUser($this->user_id, $this->username["username_new"], $this->firstname, $this->lastname, $this->rol);
        }else{
            //Si el usuario entrante es diferente al usuario que ya tiene guardado:
            //Validar que el usuario nuevo no esté tomado por otro usuario.
            if(!$this->chekcIfUserIsTaken($this->username["username_new"])){
                header("location: ../views/admin_usuarios.php?errorEdit=El nombre de usuario ya existe.&user=".$this->username["username_old"]);
                exit();
            }
            $this->editUser($this->user_id, $this->username["username_new"], $this->firstname, $this->lastname, $this->rol);
        }
        
    }

    public function compareNewandOldUserNames(){
        if($this->username["username_new"] == $this->username["username_old"]){
            return true;
        }
        return false;
    }

    public function changeUserPassword(){
        if($this->checkPasswordMatch()){
            $this->changePassword($this->password1, $this->user_id);
        }
        header("location: ../views/admin_usuarios.php?errorEdit=Las contraseñas deben coincidir.");
        exit();
    }

}