<?php
include("db/connect.php");
session_start();
$int_id = $_SESSION["int_id_x"];
if (isset($_GET["del"]) && $int_id != "" ) {
    // echo it
    $id = $_GET["del"];

    // SELECT THE AD
    $query_ad = mysqli_query($connection, "SELECT * FROM `adu_post` WHERE post_id = '$id'");
    if (mysqli_num_rows($query_ad) > 1) {
        $del_query = mysqli_query($connection, "DELETE FROM `adu_post` WHERE post_id = '$id' AND int_id = '$int_id'");
    if ($del_query) {
        echo "success";
        echo header("location: ../ams/ad_man.php");
    } else {
        echo "error";
        echo header("location: ../ams/ad_man.php");
    }
} else {
    header("location: ../ams/ad_man.php?delete");
    echo "dixs";
}
    } else {
        header("location: ../ams/ad_man.php?cant");
        echo "dixs";
    }
    
?>