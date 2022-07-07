<?php

class DepartamentosController extends Departamentos{
    
    private $codigo_direccion;

    public function __construct($codigo_direccion)
    {
        $this->codigo_direccion = $codigo_direccion;
    }

    public function showDepartments(){
        return($this->getDepartments($this->codigo_direccion));   
    }
}