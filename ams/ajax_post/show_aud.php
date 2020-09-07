<?php
include("../../function/db/connect.php");
// che
$display2 = '';
$c_id = $_POST['c_id'];
$don = "";

if ($c_id != "") {
    $don = "SELECT * FROM `adu_cache` WHERE cache_id = '$c_id' ORDER BY id DESC";
        $result = mysqli_query($connection, $don);
        if (mysqli_num_rows($result) >= 1) {
        while ($pox = mysqli_fetch_array($result)) {
            $int_id = $pox["int_id"];
            $get_cache = mysqli_query($connection, "SELECT * FROM `institution` WHERE id = '$int_id'");
    $rowx = mysqli_fetch_array($get_cache);
        $int_name = $rowx["name"];
            $display2 = '
            <tr>
            <td>'.$int_name.'</td>
            </tr>
            ';
            echo $display2;
        }
    } else {
        $display2 = '
        <tr>
        <td>All Institution</td>
        </tr>
        ';
        echo $display2;

    }
}
?>