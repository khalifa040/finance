<?php
$headers = 'From: user@example.com' . " " .
'Reply-To: user@example.com' . " " .
'X-Mailer: PHP/' . phpversion();
mail('khalifa3700@gmail.com', 'TEST', 'TEST', $headers);
?>