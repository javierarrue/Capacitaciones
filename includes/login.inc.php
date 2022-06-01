<?php
//LOGIN DE USUARIO
    if(isset($_POST["submit"])){
        //Incoming Data
        $username = $_POST["username"];
        $password = $_POST["password"];

        include "../classes/dbConnection.class.php";
        include "../classes/login.class.php";
        include "../classes/login-controller.class.php";
        
        //Objeto de Clase LoginController, se le pasan los parametros (datos de login)
        //En esta clase se hacen las validaciones a los campos solicitados.
        $login = new LoginController($username, $password);

        //Verificacion de login
        $login->loginUser();

        header("location: ../views/home.php");
    }