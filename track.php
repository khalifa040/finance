
<?php
 include ('connect.php');
$query = "INSERT INTO visitors (ip_address, timestamp) VALUES ('".$_SERVER["REMOTE_ADDR"]."', now())";
$result = mysqli_query($con, $query);
