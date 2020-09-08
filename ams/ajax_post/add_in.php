<?php
include("../../function/db/connect.php");
$u_id = $_POST["u_id"];
$int_id = $_POST["int_id"];
$date = date('Y-m-d');
if ($int_id != "" && $u_id != "")
{
    $sel_c = mysqli_query($connection, "SELECT * FROM interest WHERE interest_id = '$int_id' AND user_id = '$u_id'");
    $cui = mysqli_num_rows($sel_c);
    if ($cui <= 0) {
        $push_sql = mysqli_query($connection, "INSERT INTO `interest` (`interest_id`, `user_id`, `date`) VALUES ('{$int_id}', '{$u_id}', '{$date}')");
    if ($push_sql) {
        echo '<script type="text/javascript">
        $(document).ready(function(){
            toastr.success("Interest Sent", "Interest Added");
            $("#check_imp").val("");
        });
        </script>
        ';
    }
} else {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        toastr.error("Interest Exist", "You Have Added This Interest Before");
    });
    </script>
    ';
}
}
?>