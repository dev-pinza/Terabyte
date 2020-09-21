<?php
include("db/connect.php");
if (isset($_GET["del"])) {
    // echo it
    $id = $_GET["del"];
    $del_query = mysqli_query($connection, "DELETE FROM users WHERE id = '$id'");
    if ($del_query) {
    $acct_query = mysqli_query($connection, "DELETE FROM account WHERE `user_id` = '$id'");
        if ($acct_query) {
            header("location: ../ams/user_management.php");
        echo "done";
        } else {
            echo "error";
            echo header("location: ../ams/user_management.php");
        }
    } else {
        echo "error";
        echo header("location: ../ams/user_management.php");
    }
} else {
    header("location: ../ams/user_management.php");
    echo "dixs";
}
?>