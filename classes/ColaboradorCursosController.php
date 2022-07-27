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

    public function eliminarCSugeridoSeleccionado(){
        //Uso la variable $cedula, pero realmente, esta tiene el ID del curso sugerido seleccionado, este hace referencia al almacenado en la tabla 'csugerido_cargo_trabajador' de la bd
        $this->eliminarCSugeridoTrabajador($this->cedula);
    }
}