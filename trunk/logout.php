<?php
session_start();
unset($_SESSION['playername']);
unset($_SESSION['playerid']);
header('Location:index.php');
