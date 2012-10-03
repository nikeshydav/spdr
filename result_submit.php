<?php
session_start();
if( !isset($_SESSION['playerid'])){
	echo 'You are not logedin';
	die();
}
$result = $gameid = $payerid = '';
 
if( isset($_REQUEST['gameid'])){
	require_once 'include/config.php';
	$gameid=$_REQUEST['gameid'];
	$result=$_REQUEST['result'];
	$payerid=$_SESSION['playerid'];
	
	$sql="INSERT INTO game_result (player,gameid,result) VALUES ('$payerid', '$gameid', '$result');";
	mysql_query($sql);	
}
?>

<h1>Game 1: Stop The Train</h1>
<a href="<?php echo $_SERVER['PHP_SELF']?>?gameid=1&result=1" >Win</a>
<a href="<?php echo $_SERVER['PHP_SELF']?>?gameid=1&result=0" >Loss</a>


<h1>Game 2: Show The syuitcase</h1>
<a href="<?php echo $_SERVER['PHP_SELF']?>?gameid=2&result=1" >Win</a>
<a href="<?php echo $_SERVER['PHP_SELF']?>?gameid=2&result=0" >Loss</a>




<h1>Game 3: Park The Car</h1>
<a href="<?php echo $_SERVER['PHP_SELF']?>?gameid=3&result=1" >Win</a>
<a href="<?php echo $_SERVER['PHP_SELF']?>?gameid=3&result=0" >Loss</a>
