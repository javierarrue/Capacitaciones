<?php
if(isset($_POST["submit"])){

    $direccion = $_POST["direccion"];
    $departamento = $_POST["departamento"];
    $trabajador = explode(',',$_POST["cargo"]);
    $c_ocup = $trabajador[0];
    $cedula = $trabajador[1];
    $cursos = $_POST["cursos"];

    echo "Direccion: " . $direccion . "<br>";
    echo "Departamento: " . $departamento . "<br>";
    echo "Cargo: " . $c_ocup . "<br>";
    echo "Cedula: " . $cedula . "<br>";
    echo "<b>Cursos:</b> <br>";
    $curso_analisis = array();

    for($i = 0; $i<count($cursos); $i++){
        $curso_analisis[$cursos[$i]] = $_POST["analisis".$i];
    }

    //RECORRER ARREGLO $CURSO_ANALISIS
    /*
    foreach($curso_analisis as $curso=>$analisis){
        echo "Curso: $curso Analisis: $analisis <br>";
    }
    */
    var_dump($curso_analisis);
}