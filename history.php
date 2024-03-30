
<?php
// caution - dont remove these two lines. Thanks
// dev - unkownwallet404@gmail.com - allinonehausa@gmail.com - Khalifa Ali Ahmad Facebook
      session_start();
      include ('connect.php');
    include ('variable.php');
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
      $results = $result->fetch_assoc()
      // $f1 = $q1->fetch_array();
     // $c1 = $q1->num_rows;
 ?> 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/1a54d23b69.js" crossorigin="anonymous"></script>
    <meta content="Free Money" name="keywords">
    <meta content="Free Money" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Animation On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Time -->
<script type = "text/JavaScript" src = "https://MomentJS.com/downloads/moment.js"></script>
<!-- Alert Lib -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <link rel="stylesheet" href="dash.css">
     <script src="dash.js"></script>
     <script src="jquery.js"></script>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <script src="jquery-3.6.1.js"></script>
    <style></style>
    </head>
    <body>
<br>
<br>
<h3 class="m-4">Recent transaction</h3>
<div class="block txt-center">
<table width="100%" class="t-table txt-center">
<tr>
 <th>Reciever</th>
 <th>Amount</th>
<th>Date</th>
 </tr>
<?php
 
 $quee = "SELECT * FROM transaction WHERE sender = '$user' LIMIT 25";
 $exec = mysqli_query($con, $quee);
 
 if($exec)
  {
 if(mysqli_num_rows($exec) > 0)
 {
 
 while($rows = $exec->fetch_assoc())
 {
 echo "<tr>
        <td>".$rows['reciever']."</td>
        <td>".$rows['amount']."</td>
        <td>".$rows['date_transac']."</td>
      </tr>";
 }
 }
 else {
 echo "<tr>
       <td>0:0</td>
       <td>0/0/0</td>
      <td>0/0/0</td>
       </tr>";
 }
 
 }
?>
</table>
</div>
</div>

<input type="hidden" id="ball" value="<?php echo $results['value'] ?>">
<input type="hidden" id="user" value="<?php echo $results['username'] ?>">


<div class="footer">
<button class="green" id="topup"><i class="fa-solid fa-wallet"></i><br> wallet</button>
<button id="transfer" onclick="window.location.assign('trans.php');"><i class="fa-solid fa-money-bill-transfer"></i><br>transfer</button>
<button id="topup" onclick="window.location.assign('history.php');"><i class="fa fa-history" aria-hidden="true"></i><br>history</button>
<button id="transfer" onclick="window.location.assign('logout.php');"><i class="fa fa-sign-out"></i><br>logout</button>
</div>
</body>
</html>