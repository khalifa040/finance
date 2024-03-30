
<?php
 include("connect.php");
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname = $_POST["fullname"];
    $bvn = $_POST["bvn"];
    $pn = $_POST["pn"];
    $username = $_POST["username"];
    $queryw = "update users set fullname = '$fullname', pnumber = '$pn', verify_id = '$bvn' where username='$username'";
       if(mysqli_query($con,$queryw))
       {
        echo "<br>kyc successful!";
       }
       
    
}
