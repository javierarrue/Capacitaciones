<?php
class EstadosController extends Estados{
    public function showEstados(){
        return $this->getEstados();
    }
}