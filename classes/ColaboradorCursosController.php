<?php

class ColaboradorCursosController extends ColaboradorCursos{
    private $cedula;

    public function __construct($cedula)
    {
        $this->cedula = $cedula;
    }

    public function mostrarCursosSugeridosTrabajador(){
        return $this->obtenerCursosSugeridosTrabajador($this->cedula);
    }
}