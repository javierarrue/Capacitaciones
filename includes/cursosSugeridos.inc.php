<?php
require('../includes/config.php');

include "../classes/dbConnection.class.php";
include "../classes/dbConnection_SqlServer.class.php";
include "../classes/Direcciones.class.php";
include "../classes/DireccionesController.php";
include "../classes/CSugeridos.class.php";
include "../classes/CSugeridosController.php";

$csugeridos = new CSugeridosController("","","","","");
$obj = new DireccionesController();

$cursos_sugeridos = $csugeridos->mostrarTodosLosCursos();
$direcciones = $obj->showDirections();

/**
 * 
 * Javier Arrue 

SISTEMA DE CURSOS SUGERIDOS
 INICIO
REGISTRAR
 CURSOS SUGERIDOS
VISUALIZAR
 CARGOS
ADMINISTRAR
 USUARIOS
 CURSOS REQUERIDOS
 ESTADOS

Fatal error: Uncaught Error: Call to a member function prepare() on resource in C:\xampp\htdocs\web-app\classes\CSugeridos.class.php:55 Stack trace: #0 C:\xampp\htdocs\web-app\classes\CSugeridosController.php(18): CSugeridos->obtenerTodosLosCursos() #1 C:\xampp\htdocs\web-app\includes\cursosSugeridos.inc.php(13): CSugeridosController->mostrarTodosLosCursos() #2 C:\xampp\htdocs\web-app\views\registrar_sugerido.php(2): include('C:\\xampp\\htdocs...') #3 {main} thrown in C:\xampp\htdocs\web-app\classes\CSugeridos.class.php on line 55

 */