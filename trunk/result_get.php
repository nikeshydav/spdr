<?php
session_start();
require_once 'include/config.php';
$c='';
if(isset($_SESSION['playerid'])){
	$c =  'and player='.$_SESSION['playerid'];
}

$sql = 'SELECT count(*) as game1win FROM `game_result` where gameid=1 '.$c;
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$array[0] = $rr['game1win'];
}

$sql = 'SELECT count(*) as game1win FROM `game_result` where result=1 and gameid=1 '.$c;
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$array[1] = $rr['game1win'];
}


$sql = 'SELECT count(*) as game1win FROM `game_result` where result=0 and gameid=1 '.$c;
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$array[2] = $rr['game1win'];
}


$sql = 'SELECT count(*) as game1win FROM `game_result` where gameid=2 '.$c;
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$array[3] = $rr['game1win'];
}

$sql = 'SELECT count(*) as game1win FROM `game_result` where result=1 and gameid=2 '.$c;
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$array[4] = $rr['game1win'];
}


$sql = 'SELECT count(*) as game1win FROM `game_result` where result=0 and gameid=2 '.$c;
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$array[5] = $rr['game1win'];
}


$sql = 'SELECT count(*) as game1win FROM `game_result` where gameid=3 '.$c;
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$array[6] = $rr['game1win'];
}

$sql = 'SELECT count(*) as game1win FROM `game_result` where result=1 and gameid=3 '.$c;
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$array[7] = $rr['game1win'];
}


$sql = 'SELECT count(*) as game1win FROM `game_result` where result=0 and gameid=3 '.$c;
$r = mysql_query($sql);
while ($rr= mysql_fetch_assoc($r)) {
	$array[8] = $rr['game1win'];
}

//$array = array(1,2,3,4,5,6,7,8,9);
echo  json_encode($array);
?>