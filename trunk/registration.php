<?php
session_start();
require_once 'include/config.php';
$user=$_GET['user'];
$email=$_GET['email'];
$con_email=$_GET['con_email'];
$pass=$_GET['pass'];
$con_pass=$_GET['con_pass'];

$sql="select * from register where user='$user' or email='$email'";
$match = mysql_query($sql);
$num_rows=mysql_num_rows($match);
if ($num_rows>0){
	echo "not" ;
	die();
}
	
$sql="insert into register (user,email,password) values('$user','$email','$pass')";
mysql_query($sql);
$inserted_id=mysql_insert_id();

$reg="SELECT * FROM register WHERE id='$inserted_id'";
$r=mysql_query($reg);
while ($rr= mysql_fetch_assoc($r)) {
	echo 'ok';	
	$_SESSION['playername'] = $rr['user'];
	$_SESSION['playerid'] = $rr['id'];
}