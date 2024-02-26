<?php
require('../classes/config.php');

	$to = $_POST['email'];
	$subject = "My subject";
	$txt = $_POST['alertLevel'];
	$headers = "From: samontechristian120300@gmail.com" . "\r\n";

	mail($to,$subject,$txt,$headers);
	echo $to,$subject,$txt,$headers;
?>