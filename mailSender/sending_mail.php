<?php
 error_reporting(-1);
 ini_set('display_errors', 'On');
 set_error_handler("var_dump");

 $address = "http://10.216.2.202/hrar_notifier_dev/mailSender/content_mail.php"; // Base Server URL

 $to = $_GET['email']; // Send To
 $subject = "Alert Level: " . $_GET['alertLevel']; // Mail Subject

 $label = "HRWR";

 // send data as URL query strings via file_get_contents (GET request)
 $sentMail = file_get_contents(
     $address
         . "?to=" . $to
         . "&label=" . $label
         . "&subject=" . urlencode($subject)
 );


?>