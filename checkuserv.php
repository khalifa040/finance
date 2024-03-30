<?php
 include("connect.php");
 
 if($_SERVER['REQUEST_METHOD'] == "POST")
  {

    $username = $_POST['username'];

  if(!empty($username))
    {
     $q1 = $con->query("SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error());
		 $f1 = $q1->fetch_array();
		 $c1 = $q1->num_rows;
			if($c1 > 0){
				echo "<span style='color: green;'>valid username";
			}
      else
      {
      echo "<span style='color: red;'>invalid username";
      }
    }
}