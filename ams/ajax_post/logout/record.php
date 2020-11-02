<?php
include("../../../function/db/connect.php");
//active user
$user = $_POST["user"];

if ($user != "") {
    $activecode = "1";
// working on the time stamp right now
$ts = date('Y-m-d H:i:s');
$acuser = $user;
// $_SESSION['last_login_timestamp'] = time();
// $timmer_check = $_SESSION['last_login_timestamp'];
// AUTO LOGIN
$activeq = "UPDATE users SET users.is_active ='$activecode', users.last_logged = '$ts' WHERE users.id ='$acuser'";
$rezz = mysqli_query($connection, $activeq);
}
// Don't Wake me Up
?>