<?php
include "../classes/dbConnection.class.php";
include "../classes/CRequeridos.class.php";
include "../classes/CRequeridosController.php";

$obj = new CRequeridoController("");

$cursos_requeridos = $obj->showCourses();

/**

*/