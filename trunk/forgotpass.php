<?php
require_once 'include/config.php';
$password = '';
$user=$_GET['username'];
$sql="SELECT * FROM register WHERE user='$user'";
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$email    = $rr['email'];
	$password = $rr['password'];
}

if($password!=''){
	echo $email;
}else{
	echo 'fail';
}

$to=$email;
$subject="Recover Password";
$message = file_get_contents('Reset_Password/index.html');;
$headers = 'From: '.$user.'<'. $to .'>'. "\r\n" .
'Reply-To:'.$user.'<'. $to .'>' . "\r\n" .
'X-Mailer: PHP/' . phpversion().  "\r\n" .   
"MIME-Version: 1.0" . "\r\n" . 
"Content-type: text/html; charset=UTF-8" . "\r\n";
mail($to, $subject, $message, $headers);