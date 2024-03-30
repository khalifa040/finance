<?php

   include("connect.php");
  
   $user = $_SESSION["user"];
   
   $url = $_SERVER['SERVER_NAME'];
   $client_ip = $_SERVER['REMOTE_ADDR'];
   
   $q1 = "select * from settings";
   $result = mysqli_query($con, $q1);
   $results = $result->fetch_assoc();
  
   $sitename = $results['sitename'];

   $transac_fee = $results['transac_fee'];

   // asset name and short
   $currency = $results['currency'];

   $currency_short = $results['currency_short'];

   // register bonus
   $regiter_bonus = $results['regiter_bonus'];
   
   
  ?>