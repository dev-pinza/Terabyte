<?php
include("db/connect.php");
session_start();
$usertype = $_SESSION["usertype"];
if (isset($_GET["del"]) && $usertype != "") {
    // echo it
    $id = $_GET["del"];
    $gen_date = date('Y-m-d');
    $gen_date = date('Y-m-d', strtotime("-1 days", strtotime($gen_date)));
    $del_query = mysqli_query($connection, "UPDATE `client_post` SET `end_date` = '$gen_date' WHERE `client_post`.`id` = '$id';");
    if ($del_query) {
        header("location: ../ams/active_promo.php");
        echo "don";
    } else {
        echo header("location: ../ams/active_promo.php");
    }
} else {
    header("location: ../ams/active_promo.php");
    echo "dixs";
}
?>