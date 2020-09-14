<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'thisiste_base');
define('DB_PASSWORD', '@8;WKJddKqTo');
define('DB_CHARSET', 'utf8');
define('DB_NAME', 'thisiste_tera');
// test
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'password');
// define('DB_CHARSET', 'utf8');
// define('DB_NAME', 'sekani_admin');
// alright

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$connection){
	echo "Failed to connect database" . die(mysqli_error($connection));;
}
$dbselect = mysqli_select_db($connection, DB_NAME);
if(!$dbselect){
	echo "Failed to Select database" . die(mysqli_error($connection));
}
?>