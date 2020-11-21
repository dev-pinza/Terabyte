<?php
// making a good move
include("../../../function/db/connect.php");
// porty
session_start();
$user_id = $_SESSION["id"];
$amount = $_POST["amount"];
$manager = $_POST["manager"];
// MAD
$digits = 9;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
// end the code
$username = $_SESSION["username"];
$pass = $_POST["pin"];
// end
if ($pass != "") {
    $query_pass = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");
    $x = mysqli_fetch_array($query_pass);
    $harsh_code = $x["password"];
    if (password_verify($pass, $harsh_code)) {
        // damn
        if ($manager != "" && $amount != "" && $user_id != "") {
    // finnin
    $sql_fund = mysqli_query($connection, "SELECT * FROM account WHERE account.user_id = '$manager'");
                // test
                if (mysqli_num_rows($sql_fund) == 1) {
                    $qw = mysqli_fetch_array($sql_fund);
                $balance = $qw["balance_derived"];
                $total_dep = $qw["total_dep"];
            // SBALANCING
// make a move
// if ($status == "200" && $status != "") {
    // alright
    $cal_bal = $balance + $amount;
    $cal_dep = $total_dep + $amount;
    $digits = 9;
    $date = date("Y-m-d");
    $date2 = date('Y-m-d H:i:s');
    $randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    $trans = "SKWAL".$randms."MANUAL".$user_id;
    // GD
    $update_transaction = mysqli_query($connection, "UPDATE account SET balance_derived = '$cal_bal', total_dep = '$cal_dep' WHERE account.user_id = '$manager'");
    if ($update_transaction) {
        // WE ARE DONE
        $insert_transaction = mysqli_query($connection, "INSERT INTO `acct_transaction` (`user_id`, `transaction_id`, `transaction_type`, `amount`, `account_balance`, `credit`, `debit`, `transaction_date`) VALUES ('{$manager}', '{$trans}', 'manual_refill', '{$amount}', '{$cal_bal}', '{$amount}', '0.00', '{$date2}')");
         if ($insert_transaction) {
            //  go withdra
            echo '<script type="text/javascript">
            $(document).ready(function(){
                swal.fire({
                    type: "success",
                    title: "Successfully Funded",
                    text: "Manager was Credited",
                    showConfirmButton: false,
                    timer: 3000
                });
            });
            </script>
            ';
            $URL="manual_transfer.php";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
         } else {
            //  NOTHING AT ALL
            echo "ERROR IN TRANSACTION";
         }
    } else {
        // NOTHING AT ALL
        echo "ERROR IN WALLET";
    }
        } else {
            echo '<script type="text/javascript">
            $(document).ready(function(){
                swal.fire({
                    type: "error",
                    title: "No Transaction",
                    text: "Error Processing Managers Account",
                    showConfirmButton: false,
                    timer: 3000
                });
            });
            </script>
            ';
        }
}
        // end
    } else {
        echo '<script type="text/javascript">
        $(document).ready(function(){
            swal.fire({
                type: "error",
                title: "WRONG PASSWORD",
                text: "Please verify your password",
                showConfirmButton: false,
                timer: 3000
            });
});
</script>
';
    }
} else {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal.fire({
            type: "error",
            title: "PLEASE ENTER PASSWORD",
            text: "please enter your password",
            showConfirmButton: false,
            timer: 3000
        });
});
</script>
';
}
?>