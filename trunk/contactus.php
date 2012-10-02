<?php
$user=$_GET['name'];
$email=$_GET['email'];
$firm=$_GET['firm'];
$mb=$_GET['mb'];
$com=$_GET['com'];

$to= 'nikesh.yadav@gmail.com,hupadhyaya@aydigital.com,dkumar@adventit.in';
$subject="Contact Us Email";
$message = "
Name  :  $user \r\n
Email :  $email \r\n
Firm Name: $firm \r\n
Phone : $Phone \r\n
Comments: $com ";

$headers = 'From: '.$user.'<'. $to .'>'. "\r\n" .
'Reply-To:'.$user.'<'. $to .'>' . "\r\n" .
'X-Mailer: PHP/' . phpversion().  "\r\n" .   
"MIME-Version: 1.0" . "\r\n" . 
"Content-type: text/html; charset=UTF-8" . "\r\n";

 
mail($to, $subject, $message, $headers);
?>