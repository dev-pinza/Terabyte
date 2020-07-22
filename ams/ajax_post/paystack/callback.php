<?php
// going good
include("../../../function/db/connect.php");
// CURL
$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_live_7d955ca9d1f7814b697b4d10463d6853a5a48a0d",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status){
  // transaction was successful...
  // please check other things like whether you already gave value for this ref
  // if the email matches the customer who owns the product etc
  // Give value
  echo "<h2>Processing....</h2>";
//   STORE THE TRANSACTION - GET THE INT_ID AND OTHER STUDDS
session_start();
$user_id = $_SESSION["id"];
$amount = $_SESSION["amount"];
$trans = $_SESSION["transaction_id"];
$date = date('Y-m-d');
$date2 = date('Y-m-d H:i:s');

// CHECK IF SAME REFERENC
$wallet = mysqli_query($connection, "SELECT * FROM `account` WHERE user_id = '$user_id'");
$xm = mysqli_fetch_array($wallet);
$running_balance = $xm["balance_derived"];
$total_deposit = $xm["total_dep"];
// CALCULATED BALANCES
$run_bal = $running_balance + $amount;
$tot_dep = $total_deposit + $amount;
$select_transaction = mysqli_query($connection, "SELECT * FROM `acct_transaction` WHERE transaction_id	= '$trans'");
$num_t = mysqli_num_rows($select_transaction);
if ($num_t <= 0) {
$update_wallet = mysqli_query($connection, "UPDATE `account` SET balance_derived = '$run_bal', total_dep = '$tot_dep' WHERE user_id = '$user_id'");
if ($update_wallet) {
    $insert_transaction = mysqli_query($connection, "INSERT INTO `acct_transaction` (`user_id`, `transaction_id`, `transaction_type`, `amount`, `account_balance`, `credit`, `debit`, `transaction_date`) VALUES ('{$user_id}', '{$trans}', 'refill', '{$amount}', '{$run_bal}', '{$amount}', '0.00', '{$date2}')");
     if ($insert_transaction) {
        //  destroy ref, amount and descriptiomn
        //  ------
        echo header("Location: ../../client_bal.php");
        // redirect
     } else {
         echo "ERROR IN TRANSACTION";
     }
} else {
    echo "CANT UPDATE WALLET";
}
} else {
    echo "PAID ALREADY";
    ?>
    <a href="thisistera.com/ams/client_bal.php" >CLICK ME</a>
    <?php
}
}
// OUT IN THE EAST
?>