<?php
include("db/connect.php");
if (isset($_GET["del"])) {
    // echo it
    $id = $_GET["del"];
    $del_query = mysqli_query($connection, "UPDATE users SET is_approved = '0' WHERE id = '$id'");
    if ($del_query) {
        header("location: ../ams/user_management.php");
        echo "don";
    } else {
        echo header("location: ../ams/user_management.php");
    }
} else {
    header("location: ../ams/user_management.php");
    echo "dixs";
}
?>