<?php
session_start();
$bank_data = $_POST["bank_data"];
if ($bank_data != "") {
    $_SESSION["bank_data"] = $bank_data;
    ?>
    <input type="text" value="<?php echo $bank_data; ?>" hidden id="bank_data">
    <script>
    $(document).ready(function() {
        $("#bank_payment").prop("disabled", false);
    })
    </script>
    
    <?php
}
?>