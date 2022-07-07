<?php
class EstadosController extends Estados{
    private $estado;

    public function __construct($estado){
        $this->estado = $estado;
    }

    public function createNewStatus(){
        $this->setNewStatus($this->estado);
    }

    public function showEstados(){
        return $this->getEstados();
    }

    public function deleteEstado(){
        $this->deleteStatus($this->estado);
    }
}