<?php
$user=$_GET['name'];
$email=$_GET['email'];
$firm=$_GET['firm'];
$mb=$_GET['mb'];
$com=$_GET['com'];

$to= 'nikesh.yadav@gmail.com';
$subject="Contact Us Email";
$message = "Name  :  $user". "<br />";
$message .= "Email :  $email ". "<br />";
$message .= "Firm Name: $firm ". "<br />";
$message .= "Phone : $Phone ". "<br />";
$message .= "Comments: $com ";

$headers = 'From: '.$user.'<'. $to .'>'. "\r\n" .
'Reply-To:'.$user.'<'. $to .'>' . "\r\n" .
'X-Mailer: PHP/' . phpversion().  "\r\n" .   
"MIME-Version: 1.0" . "\r\n" . 
"Content-type: text/html; charset=UTF-8" . "\r\n";
 
mail($to, $subject, $message, $headers);