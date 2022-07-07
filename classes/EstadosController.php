<?php
class EstadosController extends Estados{
    private $estado,$idEstado;

    public function __construct($estado, $idEstado){
        $this->estado = $estado;
        $this->idEstado = $idEstado;
    }

    public function createNewStatus(){
        $this->setNewStatus($this->estado);
    }

    public function showEstados(){
        return $this->getEstados();
    }

    public function deleteEstado(){
        $this->deleteStatus($this->idEstado);
    }

    public function changeEstado(){
        $this->editEstado($this->idEstado, $this->estado);
    }
}