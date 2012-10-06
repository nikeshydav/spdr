<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="spdr"; // Database name



// Connect to server and select database.
mysql_connect("$host", "$username", "$password") || die("cannot connect");
mysql_select_db("$db_name") || die("cannot select DB");

########## app ID and app SECRET (Replace with yours) #############
$appId = '391331457606211'; //Facebook App ID
$appSecret = 'fb1536a2ca3ece6a4f40b4268fdec654'; // Facebook App Secret
$return_url = 'http://localhost/';  //path to script folder
$fbPermissions = 'publish_stream,email'; // more permissions : https://developers.facebook.com/docs/authentication/permissions/
