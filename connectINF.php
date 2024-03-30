<?php


  $dbhost = "sql200.infinityfree.com";
  $dbuser = "if0_34504170";
  $dbpass = "P69i3rYARKsKfY";
  $dbname = "if0_34504170_users";

   $con = mysqli_connect( $dbhost,$dbuser,$dbpass, $dbname);
   if(!$con)
      {
        die("faild to cennect");
      }