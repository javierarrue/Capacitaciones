<?php
include "../classes/dbConnection.class.php";
include "../classes/CSugeridos.class.php";
include "../classes/CSugeridosController.php";

$csugeridos = new CSugeridosController("","","","","");
$cursos_sugeridos = $csugeridos->mostrarTodosLosCursos();

