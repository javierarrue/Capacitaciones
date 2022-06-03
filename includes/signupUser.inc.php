<?php
//REGISTRO DE USUARIO
    if(isset($_POST["submit"])){
        //Incoming Data
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        $rol = $_POST["rol"];

        //Instanciar clase Signup-Controller
        include "../classes/dbConnection.class.php";
        include "../classes/User.class.php";
        include "../classes/UserController.php";
        
        //Objeto de Clase SignUpController, se le pasan los parametros (datos de registro)
        //En esta clase se hacen las validaciones a los campos solicitados.
        $signup = new UserController($firstname, $lastname, $username, $password1,$password2, $rol,"");

        //Registro de un usuario
        $signup->signUpUser();

        header("location: ../views/admin_usuarios.php?success=Usuario registrado con éxito.");
    }