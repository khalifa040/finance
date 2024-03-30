<?php 
 
 session_start();
 include("connect.php");
 include("variable.php");
 

  if($_POST)
    {
     // transaction info
    // $sender = $_SESSION["user"];
    
     // $sender = $_POST['pkey'];
     
     $reciever = $_POST['reciever'];
     $amount = $_POST['amount'];
     
     // sender
     $pky = $_POST['pky'];
     $date = date("d/m/Y");
     $txd = $_POST['tx'];
     
     // generate pkey
     $pkey =  hash('sha256', $pky);
     // transac hash
     $tx =  hash('sha256', $txd);
     // transaction amount + fee 
     // transac_fee variable from variable file
     $amount_fee = $amount + $transac_fee;
     
     // time to be stored in transaction table
     $h = date("h");
     $m = date("i");
     $mo = "AM";
     $e = "PM";
     $hour = ($h > 12) ? $h - 12 : $h;
     $min = ($h > 12) ? $m.$e : $m.$mo;
     $time = $hour.":".$min;
     $date = date("d/m/Y");
     
     if(!empty($reciever) && !empty($pkey))
     {
     // check if reciever is available
    /* $q1 = $con->query("SELECT * FROM `users` WHERE `username` = '$reciever'") or die(mysqli_error());
     $f1 = $q1->fetch_array();
     $c1 = $q1->num_rows;
     if(!$c1 > 0){echo "recipient username is incorrect!"; die;}
     */
     
     // check sender balance, and query reciever value
     $query = "select amount from users where address = '$pkey'";
     $quer = "select amount from users where address = '$reciever'";
     $result = mysqli_query($con,$query);
     $resul = mysqli_query($con,$quer);
     if($result && $resul)
     {
     $row_s = $result->fetch_assoc();
     // if sender has enought balance
     if($row_s['amount'] < $amount_fee)
     {
     echo "no enough balance!";
     die;
     }
     // fetch reciever balance
      $row_r = $resul->fetch_assoc();
     // carry out transaction
      $remain = $row_s['amount'] - $amount_fee;
      // reciever complete balance
      $add_b = $row_r['amount'] + $amount;
      $transac = "UPDATE `users` SET amount = $remain WHERE `address` = '$pkey'";
      $transac1 = "UPDATE `users` SET amount = $add_b WHERE `address` = '$reciever'";
      $t_r = mysqli_query($con,$transac);
      $t_r1 = mysqli_query($con,$transac1);
      // check if transaction query executed or not
      if($t_r == true && $t_r1 == true)
      {
     // insert in transaction table
      $am_send = $amount - $transac_fee;
      $queb = "insert into transaction (transac_hash, sender, reciever, amount, transac_status, blocknumber, time_transac, date_transac) values ('$tx', '$pkey', '$reciever', '$am_send', '1', 2, '$time', '$date')";
      mysqli_query($con,$queb); 
      echo "You have successfully transfered ".$amount." ".$currency.".";
      die;
      }
      else
      {
      // insert in transaction table
      $am_send = $amount - $transac_fee;
      $queb = "insert into transaction (transac_hash, sender, reciever, amount, transac_status, blocknumber, time_transac, date_transac) values ('$tx', '$pkey', '$reciever', '$am_send', '0', 2, '$time', '$date')";
      mysqli_query($con,$queb);
       echo "Failed";
       die;
      } 
     }
    }
    }
    
     echo "something is wrong!";
    