
<?php

 include("connect.php");
 include("variable.php");
 if($_SERVER['REQUEST_METHOD'] == "POST")
  {
  
    $seed = $_POST['seed'];
    
    $privateKey = $seed;
    
    $address = hash('sha256', $privateKey);
    
  if(!empty($address))
    {
     $q1 = $con->query("SELECT * FROM `users` WHERE `address` = '$address'") or die(mysqli_error());
		 $f1 = $q1->fetch_array();
		 $c1 = $q1->num_rows;
	     if($c1 > 0){
			echo "Try again!";
            die;
			}
		else
       {
      $query = "INSERT INTO `users` (`address`, `amount`, `day_add`) VALUES ('$address', 0, CURRENT_DATE())";
      if(mysqli_query($con,$query))
      {
       echo $privateKey;
       die;
       }
       else
       {
        echo "failed to add";
       }
      }
     
    }
    else
    {
     echo "No seed!";
     }

}
?>