<?php
require_once 'include/config.php';

$user=$_GET['user'];
$sender=$_GET['sender'];
$reciever=$_GET['reciever'];
$msg=$_GET['msg'];

 $sql="insert into email (name,sender,reciever,message) values('$user','$sender','$reciever','$msg')";
 mysql_query($sql);

 $to=$reciever;
 $subject="welcome";
 $message =  $msg ;
 $message .= file_get_contents('Recipients_Email/index.html');;
 $headers = 'From: '.$user.'<'. $sender .'>'. "\r\n" .
'Reply-To:'.$user.'<'. $sender .'>' . "\r\n" .
'X-Mailer: PHP/' . phpversion().  "\r\n" .   
"MIME-Version: 1.0" . "\r\n" . 
"Content-type: text/html; charset=UTF-8" . "\r\n"; 
mail($to, $subject, $message, $headers);
?>