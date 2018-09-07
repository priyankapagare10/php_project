<?php        
// Create connection    
$conn = new PDO('mysql:host='.HST.';dbname='.DBN.';charset=utf8mb4', USR, PWD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);     
/*
$conn = mysql_connect(HST, USR, PWD) OR die(mysql_error()." Failed Connecting To Mysql");
mysql_select_db(DBN) OR die("Failed Connecting To Database");
mysql_query('SET character_set_results=utf8');
mysql_query('SET names=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('SET collation_connection=utf8_general_ci');*/
?>
