<?php
//Edicion de usuarios
if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $rol = $_POST["rol"];

    echo "Usuario: " . $username . " <br>";
    echo "Nombre: " . $firstname . " <br>";
    echo "Apellido: " . $lastname . " <br>";
    echo "Contraseña: " . $password . " <br>";
    echo "Rol: " . $rol . " <br>";
   //header("location: ../views/admin_usuarios.php?password=".$password);

/*
CREATE VIEW UsersAndRoles AS 
SELECT user.id, user.user, user.password, user.firstname, user.lastname, rol.id AS id_rol, rol.rol_name FROM user JOIN rol WHERE user.rol_id = rol.id 

*/

}