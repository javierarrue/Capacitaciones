<?php
//REGISTRO DE USUARIO
    if(isset($_POST["submit"])){
        //Incoming Data
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $user = $_POST["username"];
        $password = $_POST["password"];
        $rol = $_POST["rol"];

        //Instanciar clase Signup-Controller
        include "../classes/dbConnection.class.php";
        include "../classes/signup.class.php";
        include "../classes/signup-controller.class.php";
        
        
        //Objeto de Clase SignUpController, se le pasan los parametros (datos de registro)
        //En esta clase se hacen las validaciones a los campos solicitados.
        $signup = new SignUpController($firstname, $lastname, $user, $password, $rol);

        //Registro de un usuario
        $signup->signUpUser();

        header("location: ../views/admin_usuarios.php?error=none");
    }