<?php
    class ColaboradorController extends Colaborador{
        private $cedula;

        public function __construct($cedula)
        {   
            $this->cedula = $cedula;            
        }

        public function mostrarColaborador(){
            return $this->detalleColaborador($this->cedula);
        }
    }