<?php
class CSugeridos extends DbConnection{
    protected function insertarNuevosCursos($cedula, $c_cargo, $c_dir, $c_dep, $cursos){
        //La idea es la siguiente:
        /**
         * Recibir la lista de cursos.
         * Insertar la lista de cursos en la tabla cursos sugeridos de la bd.
         * Al insertar, validar que no hayan cursos sugeridos con nombres repetidos.
         * Para lograr esta validacion, probablemente tengo que insertar cada curso, uno por uno.
         */
    }
}