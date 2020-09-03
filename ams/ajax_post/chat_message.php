<?php
include("../../function/db/connect.php");
session_start();
$sender = $_POST["sed_id"];
$receiver = $_POST["rec_id"];
$msg = preg_replace('/[^\w]/', ' ', $_POST["msg"]);
$date = date('Y-m-d');
if ($sender != "" && $receiver != "" && $msg != "") {
    $query_chat = mysqli_query($connection, "INSERT INTO `tera_chat` (`user_id`, `reciever_id`, `message`, `date`) VALUES ('{$sender}', '{$receiver}', '{$msg}', '{$date}')");
    if ($query_chat) {
        echo '<script type="text/javascript">
        $(document).ready(function(){
            toastr.success("Message Sent", "'.$msg.'");
            $("#check_imp").val("");
        });
        </script>
        ';
    } else {
        echo '<script type="text/javascript">
        $(document).ready(function(){
            toastr.error("Message Not Sent", "Mesage Wasnt Sent!");
        });
        </script>
        ';
    }
}
?>