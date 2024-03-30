
<?php
 include("connect.php");
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = $_POST["username"];
    
    $queryw = "update users set value=value-50 where username='$username'";
       if(mysqli_query($con,$queryw))
       {
        echo "<br>successful!";
       }
       
    
}