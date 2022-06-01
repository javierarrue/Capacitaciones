<?php
 include "../classes/dbConnection.class.php";
 include "../classes/users.classes.php";

 $obj = new Users();
 
 $users = $obj->getUsers();
 /**
  */