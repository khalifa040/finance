<?php
// caution - dont remove these two lines. Thanks
// dev - unkownwallet404@gmail.com - allinonehausa@gmail.com - Khalifa Ali Ahmad Facebook
      session_start();
      include ('connect.php');
      function check()
       {
    if(!(isset($_SESSION['user'])))
       {
        echo "<script>alert('session expired!'); window.location.assign('login.html');</script>";
        die;
        }
  }
  check();
     $lp = $_SESSION['user'];

      $q1 = "select * from users where username='$lp'";
      $result = mysqli_query($con, $q1);
      $results = $result->fetch_assoc();
     
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/1a54d23b69.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <script src="jquery-3.6.1.js"></script>
    <style>
        body{
    margin: 0;
    padding:0;
    word-wrap:break-word;}
        .up{padding: 10px;
            background: darkblue;}
        .title{font-size: large;
color:#FFF;
        }
hr{opacity: .3;
margin:0;}
        .user{
    background: #f2f2f2;
    padding: 2px 5px 2px 5px;
    /* position: absolute;
    right: 4px;
    top: 8px; */
    float: right;
    border: 1px solid #f2f2f2;}
    .fa-gear{opacity: .5;}
        .logout{
        text-decoration: none;
       background: #fff;
       border-radius: 100%;
       padding: 15px;
       position: absolute;
       bottom: 8px;
       right: 5px;
        }
        .support{
          text-decoration: none;
       background: #fff;
       border-radius: 100%;
       padding: 15px;
       position: absolute;
       top: 200px;
       right: 5px;}
    </style>
    <title>Dashboard</title>
</head>
<body>
   <!--   <div class="up">

    <span class="user">
<i class="fa-solid fa-gear"></i>
  <span>
    <?php echo $results['username']?>
  </span>
</span>
<span class="title"><i class="far fa-user"></i> Dashboard</span>
    </div>

  <div id="not">non</div>
  <button class='close' onclick="close()">close</button>
  
  <div class="uptwo"><br><br><br></div>

<div class="two">
  <div class="one">
    <span class="bold">Total Balance</span>
    <br><br>
    <span id="bal"><?php 
   // $bln = number_format($results['value'],2,".",","); ;
    // echo "₦"..".00";
   // echo "N".$bln;
    ?></span> 
 <br> <br>
   <a href="#"> See transactions</a>
  </div>

  <div class="second">
  <span class="bold">Referal Bonus</span>
  <br><br>
    <span id="bal"><?php 
   // $bln = number_format($results['value'],2,".",","); ;
    // echo "₦"..".00";
   // echo "N".$bln;
    ?></span> 
 <br> <br>
  No. refered <span style="font"><?php echo $results['referal_count']?></span> 
  </div>

</div>
<br><br>
<div class="actionsbtn">
<button class="dbtn re"><i class="fa-solid fa-plus"></i></button>
<button class="wbtn"><i class="fa fa-paper-plane"></i></button>
</div>
<input type="hidden" id="ball" value="<?php // echo $results['value'] ?>">
<input type="hidden" id="user" value="<?php //echo $results['username'] ?>">
  <br>
   -->
 <div class='data'> <br> <br>
 <div class="title"><span class="blue fake">Fake</span> <span class="blue rec">reciept</span></div>
 <br><br>
   <div>
     <input type='text' class='k' name='reciever' id='acnmn' placeholder='ENTER ACCOUNT NAME'>
   </div><br>
   <div>
     <input type='number' class='k' name='reciever' id='acn' placeholder='ENTER ACCOUNT NUMBER'>
   </div><br>
   <div>
     <input type='text' class='k' id='bankn' placeholder='ENTER BANK NAME'>
   </div><br>
   <div>
    <input type='number' id='amount' name='amount' class='k' placeholder='ENTER AMOUNT TO TRANSFER'>
   </div><br><br>
   <div>
    <input type='text' id='des' name='amount' class='k' placeholder='DESCRIPTION'>
   </div><br>
   <div>
   <button class='send' onclick='send()'>Transfer</button>
   </div>
</div>

  <div class="render" id="render"></div>
<br>



<span class="currency"></span>
</div>
<a href="https://www.facebook.com/profile.php?id=100092257667928" class="support">contact?</a>
<a href="logout.php" class="logout"><i class="fa fa-sign-out"></i></a>
<br>
  
<script src="file.js"></script>
<script src="js.js"></script>
</body>
</html>