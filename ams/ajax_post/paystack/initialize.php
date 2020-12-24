<?php
include('../../../function/db/connect.php');

session_start();

    $amount = $_POST["amt"];
    $trans = $_POST["trans"];
    $email = $_SESSION["email"];
    $firstname = $_SESSION["username"];
    // SESSION THE AMOUNT
    // SESSION THE DESCRIPTION
    $user_id = $_SESSION["id"];
    $_SESSION["amount"] = $amount;
    $_SESSION["transaction_id"] = $trans;
    $datetime = date('Y-m-d H:i:s');
    // make inser
    $query_trans_track = mysqli_query($connection, "INSERT INTO `transaction_track` (`user_id`, `trans_id`, `amount`, `date`, `status`) VALUES ('{$user_id}', '{$trans}', '{$amount}', '{$datetime}', 'Pending')");
    // check stateent
    if ($query_trans_track) {
      // end
  $curl = curl_init();

// url to go to after payment
$callback_url = 'https://thisistera.com/ams/ajax_post/paystack/callback.php';  

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount * 100,
    'email'=>$email,
    'firstname'=>$firstname,
    'reference'=>$trans,
    'channels'=>['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
    'callback_url' => $callback_url
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_live_7d955ca9d1f7814b697b4d10463d6853a5a48a0d", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx['status']){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
}

// comment out this line if you want to redirect the user to the payment page
print_r($tranx);
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);
// END statement
    } else {
      echo header("Location: ../../client_bal.php");
    }
?>