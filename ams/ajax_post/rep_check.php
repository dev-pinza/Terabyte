<?php
$id = $_POST["id"];
if ($id != "" && $id != "0") {
    include("../../function/db/connect.php");
    // checking.
    $check_un = mysqli_query($connection, "SELECT * FROM `users` WHERE matric = '$id' OR email = '$id' OR username = '$id' AND usertype = 'rep' ORDER BY id DESC LIMIT 1");
    $p = mysqli_fetch_array($check_un);
    if (mysqli_num_rows($check_un) >= 1) {
        $status = $p["is_approved"];
        $fn = $p["fullname"];
        if ($status == "1") {
            echo '<span style="color: #008080;">'.$fn.' You have been approved</span>'; 
        } else {
            echo '<span style="color:red;">'.$fn.' You have not been approved, please if it take longer than 24hrs call 08162399614</span>'; 
        }
        
    } else {
        echo '<span style="color:red;">Sorry we cannot find any rep with is matching ID</span>';
    }
}
?>