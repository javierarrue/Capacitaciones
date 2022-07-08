<?php
class CSugeridosController extends CSugeridos{
    private $cedula, $c_cargo, $c_dir, $c_dep, $cursos;

    public function __construct($cedula, $c_cargo, $c_dir, $c_dep, $cursos){
        $this->cedula = $cedula;
        $this->c_cargo = $c_cargo;
        $this->c_dir = $c_dir;
        $this->c_dep = $c_dep;
        $this->cursos = $cursos;
    }

    public function crearNuevosCursos(){
        $this->insertarNuevosCursos($this->cedula, $this->c_cargo, $this->c_dir, $this->c_dep, $this->cursos);
    }

    public function mostrarCursos(){
        
    }

}