<?php
$host="localhost"; // Host name
//$username="stuffraj_mahipal"; // Mysql username
//$password="Daksh123"; // Mysql password
//$db_name="stuffraj_sdlr"; // Database name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="spdr"; // Database name



// Connect to server and select database.
mysql_connect("$host", "$username", "$password") || die("cannot connect");
mysql_select_db("$db_name") || die("cannot select DB");

?>
