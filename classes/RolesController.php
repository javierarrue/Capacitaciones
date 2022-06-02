<?php
    class RolesController extends Roles{
        public function showRoles(){
            return $this->getRoles();
        }
    }