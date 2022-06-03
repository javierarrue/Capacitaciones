<?php
//Edicion de usuarios
if(isset($_POST["submit"])){

    include "../classes/dbConnection.class.php";
    include "../classes/User.class.php";
    include "../classes/UserController.php";

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $user_id = $_POST["user_id"];
    $rol_id = $_POST["rol_id"];

    $obj = new UserController($firstname,$lastname,$username,"","",$rol_id,$user_id);
    $obj->editSelectedUser();
    
    header("location: ../views/admin_usuarios.php?success=Datos del usuario ". $username . " han sido cambiados");

}