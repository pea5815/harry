<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_harry = "localhost";
$database_harry = "harry";
$username_harry = "root";
$password_harry = "";
$harry = mysql_pconnect($hostname_harry, $username_harry, $password_harry) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8"); 
?>