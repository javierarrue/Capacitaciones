<?php
class formatCedula{
    private $cedulaSinFormato;

    public function __construct($cedulaSinFormato)
    {
        $this->cedulaSinFormato = $cedulaSinFormato;
    }

    public function formatCedula(){
        $primeraParte = $this->separarPrimeraParteCedula($this->cedulaSinFormato);
    
        //Variable que ira almacenando la cedula con formato de guiones " - ".
        $cedulaConFormato = $primeraParte["provincia"];
        $libroConTomo = $this->separarLibroTomo($primeraParte["tomoConLibro"]);
        $libro = $this->limpiarLibro($libroConTomo["libro"]);
        $tomo = $this->limpiarTomo($libroConTomo["tomo"]);
        
        //Concatenando en cedula con provincia - libro - tomo.
        $cedulaConFormato .= "-".$libro . "-". $tomo; 
    
        return $cedulaConFormato;
    }
    
    private function separarPrimeraParteCedula($cedula){
        //1. En la primera, parte se saca la provincia o iniciales (primera parte) y la separa del libro y del tomo.
        //Para esto, se usa el siguiente patron:
    //    $patternPrimeraParte = "/^(?:(0)?(\d{1,2})?)?(  )?(PE)?(N)?(E)?( )?(1PI)?(1AV)?(\d{9})/";
        $patternPrimeraParte = "/^(?:(0)?(\d{1,2})?)?(  )?(\w{2})?(\w)?( )?(1\w{2})?(1AV)?(\d{9})/";
    
        //Se procesa la cedula por el patron.
        //La variable $matches es un arreglo que almacena el resultado de este patron.
        preg_match($patternPrimeraParte,$cedula,$matches);
    
        /**
         * Descripcion del contenido de $matches[]
         * Esta contiene 11 indices o grupos.
         * 0- Contiene el string original.
         * 1- Si la cedula comienza con un 0 a la izquiera, aqui se separa.
         * 2- Si la cedula tiene provincia 1-12, aqui se almacena.
         * 3- Si la cedula tiene 2 espacios en blanco, 
         * 4- Si la cedula tiene inciales PE,
         * 5- Si la cedula tiene inciales N 
         * 6- Si la cedula tiene inciales E 
         * 7- Si la cedula tiene 1 espacio en blanco,.
         * 8- Si la cedula tiene inciales 1PI.
         * 9- Si la cedula tiene inciales 1AV.
         * 10- Alacemna el resto de la cedula, (libro y tomo).
         */
    /*
         if($matches[1] != "" || $matches[2] != ""){
            return array("provincia" => $matches[2], "tomoConLibro" => $matches[10]);
         }
        
        if($matches[4]=="PE"){
            return array("provincia" => $matches[4], "tomoConLibro" => $matches[10]);
        }
        
        if($matches[5] == "N"){
            return array("provincia" => $matches[5], "tomoConLibro" => $matches[10]);
        }
    
        if($matches[8] == "1PI"){
            return array("provincia" => $matches[8], "tomoConLibro" => $matches[10]);
        }//else if($matches[9] == "1AV"){
            
        //}
       */
        if($matches[1] != "" || $matches[2] != ""){
            return array("provincia" => $matches[2], "tomoConLibro" => $matches[9]);
        }
     
        if($matches[4] != ""){
            return array("provincia" => $matches[4], "tomoConLibro" => $matches[9]);
        }  
    
        if($matches[5] != ""){
            return array("provincia" => $matches[5], "tomoConLibro" => $matches[9]);
        }
    
        return array("provincia" => $matches[7], "tomoConLibro" => $matches[9]);
    }
    
    private function separarLibroTomo($tomoLibro){
        //Patron para separar la segunda (libro) y tercera (tomo) parte 
        $patternSegundaTerceraParte = "/(\d{4})(\d{5})/";
        preg_match($patternSegundaTerceraParte,$tomoLibro,$matches);
        $result = array("libro" => $matches[1], "tomo" => $matches[2]);
        return $result;
    }
    
    private function limpiarLibro($libro){
        $patternLibro = "/(0{1,3})?(\d{1,4})/";
        //Eliminando 0 de segunda parte.
        preg_match($patternLibro,$libro,$matches);
        return $matches[2];
    }
    
    private function limpiarTomo($tomo){
        $patternTomo = "/(0{1,4})?(\d{1,5})/";
        //Eliminando 0 de tercera parte.
        preg_match($patternTomo,$tomo,$matches);
        return $matches[2];
    }
}
/*
 * Existen las sigientes tipos de cedulas:
 * Regular (provincia-libro-tomo). Ej: 1-1234-12345
 * Panameño nacido en el extranjero (PE-libro-tomo). Ej: PE-1234-123456
 * Extranjero con cédula (E-libro-tomo). Ej: E-1234-12345
 * Naturalizado (N-libro-tomo). Ej: N-1234-12345
 * Panameños nacidos antes de la vigencia (provinciaAV-libro-tomo). Ej: 1AV-1234-12345
 * Población indigena (provinciaPI-libro-tomo). Ej: 1PI-1234-12345
 *  */

 /**
 * La base de datos maneja SIEMPRE este formato de cedula: 
 * Esta formada por 3 partes, de la siguiente manera: 
 * xxxxyyyyzzzzz , 4 caracteres en la primera parte, 4 numeros en la segunda y 5 numeros en la tercera
 * 
 * Primera parte (4 caracteres, numeros o letras): 
 *  - Numero de provincia: 01-02-03-04-05-06-07-08-09-10-11-12
 *  - Letras: PE-E-N-1AV-1PI
 * Segunda parte (libro 4 NUMEROS):
 *  - Numeracion del libro
 * Tercera parte (tomo 5 NUMEROS):
 * - Numeracion del tomo
 * 
 * Cuando una cedula le falta alguna letra o numero en alguna de sus partes, se guardará de la siguiente manera:
 * - Si falta alguna letra, se colocan espacios en blanco.
 * - Si falta algun numero, se colocan 0.
 * 
 * EJEMPLOS DE CEDULA NO COMPLETAS: Las " _ " (rallitas abajo) simbolizan espacios en blanco:
 *  8-941-1079 -> 08__094101979.
 * - Primera parte de cedula (4 caracteres): 8 -> 08__, faltan 3 caracteres, por lo tanto se rellena con 0 y espacios en blanco
 * - Segunda parte (4 numeros): 0941
 * - Tercera      parte (5 numeros) 01079. 
 * 
 * PE-1-403 -> __PE000100403
 * - Primera parte de cedula (4 caracteres): PE -> __PE, faltan 2 caracteres, por lo tanto se rellena 2 espacios en blanco
 * - Segunda parte (4 numeros): 0001
 * - Tercera      parte (5 numeros) 00403. 
 * 
  * 8-941-1079 -> __N_001900548
 * - Primera parte de cedula (4 caracteres): N -> __N_, faltan 3 caracteres, por lo tanto se rellena con espacios en blanco
 * - Segunda parte (4 numeros): 0941
 * - Tercera      parte (5 numeros) 01079. 
 * 
 * EJEMPLOS DE CEDULAS COMPLETAS:
 * 10NPE123412345
 * 
 * Tomar en cuenta:
 * - NO se usan guines para separar las distintas partes de la cedula, todo es corrido.
 */

 /*
  * Proceso de la funcion formatCedula
  Procesa la cedula en 3 partes.
*/