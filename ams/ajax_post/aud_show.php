<?php
include("../../function/db/connect.php");
$c_id = $_POST["c_id"];
$int_id = $_POST["int_id"];
$date = date('Y-m-d');
if ($int_id != "" && $c_id != "")
{
    $get_cache = mysqli_query($connection, "SELECT * FROM `institution` WHERE id = '$int_id'");
    $rowx = mysqli_fetch_array($get_cache);
        $int_name = $rowx["name"];
    $sel_c = mysqli_query($connection, "SELECT * FROM adu_cache WHERE int_id = '$int_id' AND cache_id = '$c_id'");
    $cui = mysqli_num_rows($sel_c);
    if ($cui <= 0) {
        $push_sql = mysqli_query($connection, "INSERT INTO `adu_cache` (`cache_id`, `int_id`, `aud_name`, `date`) VALUES ('{$c_id}', '{$int_id}', '{$int_name}', '{$date}')");
    if ($push_sql) {
        echo '<script type="text/javascript">
        $(document).ready(function(){
            toastr.success("'.$int_name.'", "Campus Added");
            $("#check_imp").val("");
        });
        </script>
        ';
    }
} else {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        toastr.error("Campus Exist", "You Have Added '.$int_name.' Before");
    });
    </script>
    ';
}
}
?>