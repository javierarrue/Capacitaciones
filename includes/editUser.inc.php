<?php
//Edicion de usuarios
if(isset($_POST["submit"])){

    include "../classes/dbConnection.class.php";
    include "../classes/User.class.php";
    include "../classes/UserController.php";

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = array(
        "username_new" => $_POST["username_new"],
        "username_old" => $_POST["username_old"]
    );
    $user_id = $_POST["user_id"];
    $rol_id = $_POST["rol_id"];

    $obj = new UserController($firstname,$lastname,$username,"","",$rol_id,$user_id);
    $obj->editSelectedUser();
    
    header("location: ../views/admin_usuarios.php?success=Datos del usuario ". $username["username_new"] . " han sido cambiados");

}