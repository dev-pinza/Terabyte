<?php
include("../../../function/db/connect.php");
$user = $_POST["user"];

if ($user != "") {
$query = "SELECT * FROM users WHERE is_active = '1'";
$result = mysqli_query($connection, $query);
if ($result) {
    $inr = mysqli_num_rows($result);
    echo $inr;
}
}
?>