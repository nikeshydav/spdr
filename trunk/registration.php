<?php
require_once 'include/config.php';
$user=$_GET['user'];
$email=$_GET['email'];
$con_email=$_GET['con_email'];
$pass=$_GET['pass'];
$con_pass=$_GET['con_pass'];

$sql="insert into register (user,email,password) values('$user','$email','$pass')";
mysql_query($sql);


 /* $to=$reciever;
 $subject="welcome";
 $message=$msg;
 $headers = 'From: '.$user.'<'. $sender .'>'. "\r\n" .
'Reply-To:'.$user.'<'. $sender .'>' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
 
 
mail($to, $subject, $message, $headers);*/


?>