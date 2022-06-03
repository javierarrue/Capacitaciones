<?php
if(isset($_POST["submit"])){

    include "../classes/dbConnection.class.php";
    include "../classes/User.class.php";
    include "../classes/UserController.php";

    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $user_id = $_POST["user_id"];

    $obj = new UserController("","","",$password1,$password2,"",$user_id);
    $obj->changeUserPassword();
    
    header("location: ../views/admin_usuarios.php?success=Contraseña del usuario ". $username . " han sido cambiada");

}