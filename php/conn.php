<?php
$dbUserName = "xx";
$dbPasswd = "xxxx";
$conn = mysql_connect("localhost", $dbUserName, $dbPasswd) or die('connect to database failed!');
mysql_select_db("salary_system", $conn) or die('connect to database failed!');
mysql_query("SET NAMES 'utf8'");
?>
