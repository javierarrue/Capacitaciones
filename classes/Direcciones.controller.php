<?php

    class DireccionesController extends Direcciones{
    
        public function showDirections(){
            return($this->getDirections());
            
        }
    }