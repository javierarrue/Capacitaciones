<?php
  include "../classes/dbConnection.class.php";
  include "../classes/User.class.php";
  include "../classes/UserController.php";
  include "../classes/Roles.class.php";
  include "../classes/RolesController.php";

 $user = new UserController("","","","","","","");
 $rol = new RolesController();
 
 $users = $user->showUsers();
 $roles = $rol->showRoles();
 /**

  */