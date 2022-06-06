<?php
    class CRequeridoController extends CRequerido{
        private $cursos;

        public function __construct($cursos)
        {
            $this->cursos = $cursos;
        }

        public function createNewCourse(){
            $this->setNewCourse($this->cursos);
        }

        public function showCourses(){
            return $this->getCourses();
        }
    }