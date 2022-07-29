<?php
require('../includes/config.php');
include "../classes/dbConnection_SqlServer.class.php";
include "../classes/Cargos.class.php";
include "../classes/CargosController.php";

if (isset($_POST['C_DEPTO'])) {
    $obj = new CargosController($_POST['C_DEPTO']);

    $cargos = $obj->showCharges();

    if (count($cargos) > 0) {
        echo '<option value="" selected> Seleccione un cargo </option>';
        $temp = "";
        foreach ($cargos as $value) {

            if ($temp != $value["cargo"]) {
                echo '<optgroup label="' . $value["cargo"] . '">';
            }
            echo '<option value=" ' . $value["C_OCUP"] . ',' . $value["cedula_sin_guiones"] . '">';
            echo $value["cargo"] . " | ";
            echo $value["nombre"] . " ";
            echo $value["apellido"] . " | ";
            echo $value["cedula"] . " ";
            echo '</option>';
            $temp = $value["cargo"];

            if ($temp != $value["cargo"]) {
                echo '</optgroup>';
            }
        }
    } else {
        echo '<option value="" selected> Departamento no disponible </option>';
    }
}
