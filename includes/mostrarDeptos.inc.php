<?php
require('../includes/config.php');
include "../classes/dbConnection_SqlServer.class.php";
include "../classes/Departamentos.class.php";
include "../classes/DepartamentosController.php";

if(isset($_POST['C_DIR'])){

    $obj = new DepartamentosController($_POST['C_DIR']);

    $departamentos = $obj->showDepartments();
    
    if(count($departamentos)>0){
        echo '<option value="" selected> Seleccione un departamento </option>';

        foreach($departamentos as $departamento => $depto_codigo){
            echo '<option value="'.$depto_codigo.'">'.$departamento.'</option>';
        }
    }else{
        echo '<option value="" selected> Departamento no disponible </option>';
    }
    

}

