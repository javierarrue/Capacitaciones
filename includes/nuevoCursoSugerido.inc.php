<?php
if(isset($_POST["submit"])){
    include "../classes/dbConnection.class.php";
    include "../classes/CSugeridos.class.php";
    include "../classes/CSugeridosController.php";

    $c_dir = $_POST["direccion"];
    $c_dep = $_POST["departamento"];
    //La variable $trabajador recibe: cedula y codigo de su cargo.
    $trabajador = explode(',',$_POST["cargo"]);
    $c_cargo = $trabajador[0];
    $cedula = $trabajador[1];
    //Listado de cursos a registrar.
    $cursos = $_POST["cursos"];
    //Arrglo $curso_analisis almacena: nombre del curso y si ha sido aceptado o no.
    //Ejemplo: Curso 1 => Aceptado, Curso 2 => No Aceptado ...
    $curso_analisis = array();

    for($i = 0; $i<count($cursos); $i++){
        $curso_analisis[$cursos[$i]] = $_POST["analisis".$i];
    }

    $obj = new CSugeridosController($cedula,$c_cargo, $c_dir, $c_dep, $curso_analisis);
    $obj->crearNuevosCursos();

    header("location: ../views/registrar_sugerido.php?success=Cursos registrados con éxito.");

    //RECORRER ARREGLO $CURSO_ANALISIS
    /*
    foreach($curso_analisis as $curso=>$analisis){
        echo "Curso: $curso Analisis: $analisis <br>";
    }
    */
}