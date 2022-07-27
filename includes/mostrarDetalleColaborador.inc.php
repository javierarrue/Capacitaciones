<?php
    include "../classes/dbConnection.class.php";
    include "../classes/dbConnection_SqlServer.class.php";
    include "../classes/Colaborador.class.php";
    include "../classes/ColaboradorController.php";
    include "../classes/ColaboradorCursos.class.php";
    include "../classes/ColaboradorCursosController.php";
    include "../classes/Estados.class.php";
    include "../classes/EstadosController.php";

    $cSugeridosObj = new ColaboradorCursosController($_GET["cedula"]);
    $cSugeridosColaborador = $cSugeridosObj->mostrarCursosSugeridosTrabajador();

    $colaboradorDetalleobj = new ColaboradorController($_GET["cedula"]) ;
    $colaboradorDetalle = $colaboradorDetalleobj->mostrarColaborador();

    $estadosObj = new EstadosController("","");

    $estados = $estadosObj->showEstados();