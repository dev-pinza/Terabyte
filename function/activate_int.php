<?php
include("db/connect.php");
session_start();
$usertype = $_SESSION["usertype"];
if (isset($_GET["del"]) && $usertype == "super") {
    // echo it
    $id = $_GET["del"];
    $up_query = mysqli_query($connection, "UPDATE `institution` SET active = '1' WHERE id = '$id'");
    if ($up_query) {
            header("location: ../ams/user_management.php");
        echo "done";
    } else {
        echo "error";
        echo header("location: ../ams/user_management.php");
    }
} else {
    header("location: ../ams/user_management.php");
    echo "dixs";
}
?>