<?php
    include "../classes/dbConnection.class.php";
    include "../classes/Estados.class.php";
    include "../classes/EstadosController.php";

    $obj = new EstadosController("");

    $estados = $obj->showEstados();