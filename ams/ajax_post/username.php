<?php
$username = preg_replace('/[^\w]/', '', $_POST["username"]);
$email = $_POST["email"];
if ($username != "" || $email != "") {
    include("../../function/db/connect.php");
    // checking.
    $check_un = mysqli_query($connection, "SELECT * FROM `users` WHERE username = '$username' OR email = '$email'");
    $p = mysqli_fetch_row($check_un);
    if ($p <= 0) {
        echo '<span style="color: #008080;">Form Good Looking Good</span>';
        echo '<script type="text/javascript">
    $(document).ready(function(){
        $(":input[type=submit]").prop("disabled", false);
    });
    </script>';
    } else {
        echo '<span style="color:red;">E-mail or Username Exist</span>';
        echo '<script type="text/javascript">
    $(document).ready(function(){
        $(":input[type=submit]").prop("disabled", true);
    });
    </script>';
    }
}
?>