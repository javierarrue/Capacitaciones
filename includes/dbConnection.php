<?php
    require('./config.php');

    try {
        $conex = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASSWORD);
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        die("conexión a la base de datos fallida: ".$e->getMessage());
    }