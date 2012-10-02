<?php
session_start();
require_once 'include/config.php';
$user=$_REQUEST['user'];
$password=$_REQUEST['pass'];

$sql="SELECT * FROM register WHERE user='$user' and password='$password'";
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	echo 'ok';	
	$_SESSION['playername'] = $rr['user'];
	$_SESSION['playerid'] = $rr['id'];
}