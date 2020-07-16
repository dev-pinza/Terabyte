<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no pssword) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'thisiste_base');
define('DB_PASSWORD', '@8;WKJddKqTo');
define('DB_CHARSET', 'utf8');
define('DB_NAME', 'thisiste_tera');
// hello
// test
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'password');
// define('DB_CHARSET', 'utf8');
// define('DB_NAME', 'sekani_admin');

// MUTE NOTICES
error_reporting(E_ALL & ~E_NOTICE);

// LIB PATH
// ! MANUALLY CHANGE THIS IF PHP IS THROWING FILE-NOT-FOUND ERRORS !
define('PATH_LIB', __DIR__ . DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR);
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$caching=10;
?>