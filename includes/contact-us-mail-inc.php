<?php
$to = "spicytrivia@gmail.com";
$subject = "Test From Localhost";
$txt = "Localhost Own Server";
$headers = "From: bgogoi.user@gmail.com" . "\r\n";

mail($to,$subject,$txt,$headers);
?>