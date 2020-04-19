<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '192.168.178.100:52025');
define('DB_USERNAME', 'web_limowien');
define('DB_PASSWORD', '/;au({QqDewRRBvXDgX!kgk=*Q_>_6');
define('DB_NAME', 'web_limowien');
 
/* Attempt to connect to MySQL database */
$link =  mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$link->set_charset("utf8");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>