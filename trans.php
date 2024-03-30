<?php
// caution - dont remove these two lines. Thanks
// dev - unkownwallet404@gmail.com - allinonehausa@gmail.com - Khalifa Ali Ahmad Facebook
 /*     session_start();
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
 //  check();
     $lp = $_SESSION['user'];

      $q1 = "select * from users where pkey='$lp'";
      $result = mysqli_query($con, $q1);
      $results = $result->fetch_assoc()
      // $f1 = $q1->fetch_array();
     // $c1 = $q1->num_rows;
 */ ?>
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
     <script src="log.js"></script>
     <script src="jquery.js"></script>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <script src="../jquery-3.6.1.js"></script>
    <style>
    .up{Padding: 15px;
    background: #fff; 
    font-size: 33px;
    margin-top: 0; }
    .title{font-size: large;
    color:#FFF;
    }
    hr{opacity: .3;
    margin:0;}
    
    #pkey{border:none;}
    
    .fa-gear{opacity: .5;}
    .logout{
    text-decoration: none;
    background: #fff;
    border-radius: 100%;
    padding: 15px;
    position: -webkit-sticky; /* Safari */
    position: sticky;
    bottom: 8px;
    
    }
    
    
    .transac_div{width:90%;
    margin: auto;
    }
    
    
    #confirm_div{position: relative;
    top: -50%;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
    }
    #amount_r{padding: 10px;}
    .prompt{text-align: center;
    display: none; 
    border-radius:5px; 
    padding:10px;
    background: #fff; 
    max-width:80%; 
    margin: auto;}
    #amount{font-size:40px;}
    
    
    .confirm_btn, .cancel_btn, .amount_t, .amount_r, #invoke_t{
    background: #4CAF50;
    color: white;
    padding: 7px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #4CAF50;
    border-radius: 4px;
    box-sizing: border-box;
    outline: none;
    }
    .cancel_btn{background: transparent;
    border: 1px solid #f2f2f2;
    color: black;}
    .confirm_btn:hover{background: #45a049;}
    #amount_r, #amount_t{
    background: #fff;
    outline: none;
    text-align: center;
    
    }
    #amount_t{
    font-size:40px; 
    outline: none; 
    background: #fff;
    color: black;
    border: none;}
    #amount_r{color: black;}
    
    @media screen and (min-width: 600px) {
    
    }
    </style>
    </head>
   <body> 

<div class="transac_div txt-center block">
<h4>Transfer</h4>
<input type="number" class="amount_t" value="0" id="amount_t" placeholder="0"><br>
<br><center><span style="text-align: center;">Amount</span></center>
<br><br>
<input class="amount_r" id="amount_r" placeholder="Recipient username">
<br>
  <br>
  <input class="pkey" id="pkey" placeholder="Sender PKEY">
  <br>
<button id="invoke_t">Send</button>
</div>
<br><br>
<div 
id="confirm_div" class="prompt">
  <h4>Confirm Transfer</h4>
  <span id="amount"></span>
  <br>
  <!-- transac fee and short asset name -->
  <small>Fee: <?php echo $transac_fee." ".$currency_short ?></small>
  <br><br>
 <b> Recipient</b><br><br>
  <span id="reciever"></span>
  <br>
  <br>
  <button id="confirm_t" class="confirm_btn">Confirm</button><br>
  <button class="cancel_btn">Cancel</button>
</div>

<div class="footer">
<button class="" id="topup" onclick="window.location.assign('index.html');"><i class="fa-solid fa-wallet"></i><br> wallet</button>
<button class="green" id="transfer"><i class="fa-solid fa-money-bill-transfer"></i><br>transfer</button>
<button id="topup" onclick="window.location.assign('history.php');"><i class="fa fa-history" aria-hidden="true"></i><br>history</button>
<button id="transfer" onclick="logout()"><i class="fa fa-sign-out"></i><br>logout</button>
</div>
<script type="text/javascript" src="transac.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//asign wallet key
	$("#pkey").val(localStorage.wkey)
	
	$("#invoke_t").click(function(){
	 localStorage.setItem("reciever",$("#amount_r").val())
	 localStorage.setItem("amount",$("#amount_t").val())
	 
	 $("#reciever").html(localStorage.reciever);
	 $("#amount").html(localStorage.amount);
	 $("#confirm_div").fadeIn(1000);
	});
	
	$("#confirm_t").click(function(){
	amount = localStorage.amount
	reciever = localStorage.reciever
	pkey = localStorage.pkey
	tx = moment().toString();
	$("#confirm_t").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
	// cancel
	$(".cancel_btn").click(function(){
	$("#confirm_div").fadeOut(100);
	});
	// request to server
		
	$.post("transac.php",
	{
	reciever : reciever,
	amount : amount,
	tx : tx,
	pky : pkey
	},
	function(data,status){
	$("#confirm_div").fadeOut(100, () =>{
	$("#confirm_t").html("Confirm");
	
	
	switch (data) {
	
	case "recipient username is incorrect!":
	swal("Tranfer", data, "error");
	break;
	
	case "no enough balance!":
	swal("Tranfer", data, "error");
	break;
	
	default:
	swal("Tranfer", data, status);
	}
	
	
	})	
    });
    });
    
    $("#transfer").click(function(){
    $("#allmain").html("<i class='fa fa-circle-o-notch fa-spin'></i>");
    $.post("tr.php",
    {},
    function(data){
    $("#allmain").html(data);
    });
  /*  
    $.get("tr.php", function(data){
     $("#allmain").html(data);
    });
    */
    });
    
    
});

function logout(){
localStorage.removeItem("balance")
localStorage.removeItem("address")
localStorage.removeItem("wkey")
 alert("logout successfully!")
 window.location.assign('login.html');
}
</script>

</body>
</html>