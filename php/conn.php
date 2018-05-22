<?php
// --  Replace user_name and user_password with the real you use
$dbUserName = "user_name";
$dbPasswd = "user_password";
$conn = mysql_connect("localhost", $dbUserName, $dbPasswd) or die('connect to database failed!');
mysql_select_db("salary_system", $conn) or die('connect to database failed!');
mysql_query("SET NAMES 'utf8'");
?>
