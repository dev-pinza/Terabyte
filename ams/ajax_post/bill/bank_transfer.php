<?php
// making a good move
include("../../../function/db/connect.php");
// porty
session_start();
$user_id = $_SESSION["id"];
$recipient_code = $_POST["recipient_code"];
$bank_amount = $_POST["bank_amount"];
$charge_amount = ($bank_amount * 0.03) + $bank_amount;
// MAD
$digits = 9;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
// end the code
$username = $_SESSION["username"];
$pass = $_POST["password_bank"];
// end
if ($pass != "") {
    $query_pass = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");
    $x = mysqli_fetch_array($query_pass);
    $harsh_code = $x["password"];
    if (password_verify($pass, $harsh_code)) {
        if ($recipient_code != "" && $bank_amount != "" && $user_id != "") {
            // finnin
            $sql_fund = mysqli_query($connection, "SELECT * FROM account WHERE account.user_id = '$user_id'");
                $qw = mysqli_fetch_array($sql_fund);
                $balance = $qw["balance_derived"];
                $total_with = $qw["total_with"];
                // test
                if ($balance >= $charge_amount) {
                    // STAT API
                    $url = "https://api.paystack.co/transfer";
                    $fields = [
                      'source' => "balance",
                      'amount' => $bank_amount*100,
                      'recipient' => "$recipient_code",
                      'reason' => "Terabyte Bank Payment"
                    ];
                    $fields_string = http_build_query($fields);
                    //open connection
                    $ch = curl_init();
                    
                    //set the url, number of POST vars, POST data
                    curl_setopt($ch,CURLOPT_URL, $url);
                    curl_setopt($ch,CURLOPT_POST, true);
                    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                      "Authorization: Bearer sk_live_7d955ca9d1f7814b697b4d10463d6853a5a48a0d",
                      "Cache-Control: no-cache",
                    ));
                    
                    //So that curl_exec returns the contents of the cURL; rather than echoing it
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                    
                    //execute post
                    $result = curl_exec($ch);
                    // echo $result;
                // echo $response;
                // make 
        $obj = json_decode($result, TRUE);
        $status = $obj['status'];
        $msg = $obj['message'];
        // make a move
        if ($status == true && $status != "") {
            // add it
            // alright
            $cal_bal = $balance - $charge_amount;
            $cal_with = $total_with + $charge_amount;
            $digits = 9;
            $date = date("Y-m-d");
            $date2 = date('Y-m-d H:i:s');
            $randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
            $trans = "TERA".$randms."BANK".$user_id;
            // GD
            $update_bank_t = mysqli_query($connection, "UPDATE  `payout_transaction` SET amount = '$bank_amount', payment_status = 'Pending' WHERE `recipient_code` = '$recipient_code' AND `user_id` = '$user_id'");
            // end
            $update_transaction = mysqli_query($connection, "UPDATE account SET balance_derived = '$cal_bal', total_with = '$cal_with' WHERE account.user_id = '$user_id'");
            if ($update_transaction) {
                // WE ARE DONE
                $insert_transaction = mysqli_query($connection, "INSERT INTO `acct_transaction` (`user_id`, `transaction_id`, `transaction_type`, `amount`, `account_balance`, `credit`, `debit`, `transaction_date`) VALUES ('{$user_id}', '{$trans}', 'bank_transfer', '{$charge_amount}', '{$cal_bal}', '0.00', '{$charge_amount}', '{$date2}')");
                 if ($insert_transaction) {
                    //  go withdra
                    echo '<script type="text/javascript">
            $(document).ready(function(){
                swal.fire({
                    type: "success",
                    title: "Transaction Successful - '.$msg.'",
                    text: "Payment should be settled to your account in 24 hrs!",
                    showConfirmButton: false,
                    timer: 6000
                });
            });
            </script>
            ';
            $URL="withdrawal.php";
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
                    title: "Error Message - '.$msg.'",
                    text: "BANK TRANSFER ERROR",
                    showConfirmButton: false,
                    timer: 5000
                });
            });
            </script>
            ';
        }
            // }
                } else {
                    echo '<script type="text/javascript">
                    $(document).ready(function(){
                        swal.fire({
                            type: "error",
                            title: "INSUFFICIENT FUND, YOU MUST HAVE 3%",
                            text: "REFILL OR SHARE MORE AD",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    });
                    </script>
                    ';
                }
        }
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