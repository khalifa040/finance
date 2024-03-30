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
      $results = $result->fetch_assoc()
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
    .formdiv{position: absolute;
                width: 80%;
            padding: 10px;
            top: 35px;
           border-radius: 4px;
           background: #f2f2f2;
           left: 10%;
           border: 1px solid #4CAF50;
    }
    input{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
   display: inline-block;
   border: 1px solid #4CAF50;
   border-radius: 4px;
    box-sizing: border-box;
  }
  button{
        background: #4CAF50;
        color: white;
    padding: 7px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;}
    button:hover{background: #45a049;}
    h3, a{text-decoration: none;
    color: #4CAF50;}
    input{border: 1px solid #4CAF50;}
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
    <title>KYC</title>
</head>
<body>

<input type="hidden"  id="username" value="<?php echo $results['username']?>">

    <div class="formdiv">
    <h3 align="center">KYC page</h3>
    <label>Full name</label><br>
    <input type="text" id="fullname" placeholder="Full name"><br><br>
    <label>Phone number</label><br>
    <input type="number" id="pn" placeholder="Phone number"><br><br>

        <label>Enter BVN</label><br>
    <input type="text" id="bvn" placeholder="BVN"><br><br>
    <button id="kycbtn">initiate KYC</button>
    <span id="a"></span>
   <br>go back to dashboard? <a href="dash.php">dash</a>
   </div>





<a href="tel:+2349066947271" class="support">?</a>
<a href="logout.php" class="logout"><i class="fa fa-sign-out"></i></a>
<br>
  <div class="copyright">
  Open Source<br><br><a href="https://github.com/Scientist040/referal-system-plus"><i class="fa-brands fa-github "></i></a>
  </div>
<script>
    $("#kycbtn").click(function(){
		var bvn = $("#bvn").val();
        var username = $("#username").val();
        var pn = $("#pn").val();
        var fullname = $("#fullname").val();
		if(bvn.length < 11)
		{
		alert("invalid bvn")
		}
		else
		{
            alert("Wait while we process your inputs!");
				$.post("kycr.php",
			{
				bvn : bvn,
                username : username,
                fullname : fullname,
                pn : pn
			},
			function(data,status){
				$("#a").html(data);
			}
			)
		}
	 });
</script>
<script src="filer.js"></script>
<script src="js.js"></script>
</body>
</html>