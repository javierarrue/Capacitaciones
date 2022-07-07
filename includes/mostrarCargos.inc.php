<?php
include "../classes/dbConnection_SqlServer.class.php";
include "../classes/Cargos.class.php";
include "../classes/CargosController.php";

if(isset($_POST['C_DEPTO'])){
    $obj = new CargosController($_POST['C_DEPTO']);

    $cargos = $obj->showCharges();

    if(count($cargos)>0){
        echo '<option value="" selected> Seleccione un cargo </option>';

        foreach($cargos as $value){
            echo '<option value=" '. $value["C_OCUP"] .' ">';
            echo $value["cargo"] . " | ";
            echo $value["nombre"] . " ";
            echo $value["apellido"] . " | ";
            echo $value["cedula"] . " ";
            echo "</option>";
        }
    }else{
        echo '<option value="" selected> Departamento no disponible </option>';
    }

    /*
    if(count($cargos)>0){
        echo '<option value="" selected> Seleccione un departamento </option>';

        foreach($cargos as $cargo => $depto_codigo){
            echo '<option value="'.$depto_codigo.'">'.$departamento.'</option>';
        }
    }else{
        echo '<option value="" selected> Departamento no disponible </option>';
    }
    */
    
}

