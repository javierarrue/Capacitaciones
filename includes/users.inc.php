<?php
  include "../classes/dbConnection.class.php";
  include "../classes/User.class.php";
  include "../classes/UserController.php";

 $obj = new UserController("","","","","");
 
 $users = $obj->showUsers();
 /**

  */