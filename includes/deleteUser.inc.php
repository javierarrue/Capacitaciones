<?php
if(isset($_POST["username"])){
    include "../classes/dbConnection.class.php";
    include "../classes/User.class.php";
    include "../classes/UserController.php";
  
   $obj = new UserController("","",$_POST["username"],"","");
   $obj->deleteSelectedUser();

   header("location: ../views/admin_usuarios.php?success=Usuario eliminado.");
}
