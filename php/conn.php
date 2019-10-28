<?php
// Replace blank and dusk with the real user_name and user_password
// you set in sql/create_userdb.sql
// %s/blank/xx/gc
$dbUserName = "blank";
$dbPasswd = "dusk";
$conn = mysql_connect("localhost", $dbUserName, $dbPasswd) or die('connect to database failed!');
mysql_select_db("salary_system", $conn) or die('connect to database failed!');
mysql_query("SET NAMES 'utf8'");
?>
