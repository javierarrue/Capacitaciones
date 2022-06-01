<?php
if(isset($_POST["submit"])){
    include "../classes/dbConnection.class.php";
    include "../classes/User.class.php";
    include "../classes/UserController.php";
  
   $obj = new UserController("","",$_POST["username"],"","");
   $obj->deleteSelectedUser();
}
