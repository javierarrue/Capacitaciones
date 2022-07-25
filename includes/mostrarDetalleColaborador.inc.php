<?php
    include "../classes/dbConnection.class.php";
    include "../classes/dbConnection_SqlServer.class.php";
    include "../classes/Colaborador.class.php";
    include "../classes/ColaboradorController.php";
    include "../classes/ColaboradorCursos.class.php";
    include "../classes/ColaboradorCursosController.php";

    $cSugeridosObj = new ColaboradorCursosController($_GET["cedula"]);
    $cSugeridosColaborador = $cSugeridosObj->mostrarCursosSugeridosTrabajador();

    $colaboradorDetalleobj = new ColaboradorController($_GET["cedula"]) ;
    $colaboradorDetalle = $colaboradorDetalleobj->mostrarColaborador();

   print_r($colaboradorDetalle);