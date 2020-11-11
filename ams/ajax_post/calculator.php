<?php 
include("../../function/db/connect.php");
if (isset($_POST["c_id"])){
    $cache_id = $_POST["c_id"];
$query_audience = mysqli_query($connection, "SELECT * FROM `adu_cache` WHERE cache_id = '$cache_id'");
$number = mysqli_num_rows($query_audience);
    if ($number > 0) {
        $total_due =  $_POST["amount"] * $number;
    } else {
        $query_audiencex = mysqli_query($connection, "SELECT * FROM `institution` WHERE active = '1'");
$numberx = mysqli_num_rows($query_audiencex);
        $total_due =  $_POST["amount"] * $numberx;
    }
    ?>
    <input type="text" name="amount_done" value="<?php echo $total_due; ?>" id="duedue" hidden>
    <script>
         var qamt = document.getElementById("amt_due");
         qamt.innerHTML = $('#duedue').val();
    </script>
    <?php
} else {
    echo "Nothing";
}
?>