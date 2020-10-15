<?php
session_start();
$_SESSION["logged_in"] = false;
header("Location:http://cs401fp/account/login.php");
exit();
