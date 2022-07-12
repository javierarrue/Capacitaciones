<?php
require('../includes/config.php');
include "../classes/dbConnection_SqlServer.class.php";
include "../classes/Cargos.class.php";
include "../classes/CargosController.php";
if(isset($_POST['C_DEPTO'])){
    $obj = new CargosController($_POST['C_DEPTO']);

    $cargos = $obj->showCharges();

    if(count($cargos)>0){
        foreach($cargos as $value){
            $arreglo["data"][] = $value;
        }

        echo json_encode($arreglo);

    }else{
        $respuesta = array("nombre" => "-", "apellido" => "-", "cedula" => "-", "cargo" => "-","btn_detalle" => "-");
        echo json_encode(['data' => $respuesta]);
    }
}