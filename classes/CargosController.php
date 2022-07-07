<?php
    class CargosController extends Cargos{
        private $c_direccion, $c_depto;

        public function __construct(/*$c_direccion,*/ $c_depto)
        {
            /*$this->c_direccion = $c_direccion;*/
            $this->c_depto = $c_depto;
        }

        public function showCharges(){
            return $this->getCharges(/*$this->c_direccion,*/ $this->c_depto);
        }
    }