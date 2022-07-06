<?php
include "../classes/dbConnection_SqlServer.class.php";
include "../classes/Direcciones.class.php";
include "../classes/Direcciones.controller.php";

$obj = new DireccionesController();

$direcciones = $obj->showDirections();