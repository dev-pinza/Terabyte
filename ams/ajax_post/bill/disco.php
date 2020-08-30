<?php
// making a good move
include("../../../function/db/connect.php");
// porty
session_start();
$user_id = $_SESSION["id"];
$disco = $_POST["disco"];
$meter = $_POST["meter"];
$phonenumber = $_POST["phone"];
$type = $_POST["dis_type"];
$amount = $_POST["amt"];
$name = $_POST["name"];
$address = $_POST["address"];
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
if ($disco != "" && $meter != "" && $amount != "" && $user_id != "") {
    // finnin
    $sql_fund = mysqli_query($connection, "SELECT * FROM account WHERE account.user_id = '$user_id'");
                $qw = mysqli_fetch_array($sql_fund);
                $balance = $qw["balance_derived"];
                $total_with = $qw["total_with"];
        // test
        if ($balance >= $amount) {
            // STAT API
            $curl = curl_init();

            curl_setopt_array($curl, array(
            //   CURLOPT_URL => "http://34.68.51.255/shago/public/api/test/b2b",
              CURLOPT_URL => "https://shagopayments.com/api/live/b2b",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS =>"{\r\n\"serviceCode\" : \"AOB\",\r\n\"disco\" : \"$disco\",\r\n\"meterNo\": \"$meter\",\r\n\"type\" : \"$type\",\r\n\"amount\": \"$amount\",\r\n\"phonenumber\": \"$phonenumber\",\r\n\"name\": \"$name\",\r\n\"address\":\"$address\",\r\n\"request_id\" : \"$randms\"\r\n}",
              CURLOPT_HTTPHEADER => array(
                "hashKey: bc3057a73931966eb1bee550dbf78326bf35bd39833e5dfa97a4a8bc664ce353",
                "Content-Type: application/json"
                // "email: test@shagopayments.com",
                // "password: test123"
              ),
            ));
            
            $response = curl_exec($curl);  
$err = curl_close($curl);
if ($err) {
    //    echo "cURL Error #:" . $err;
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal.fire({
            type: "error",
            title: "CONNECTION ERROR",
            text: "TIMED OUT",
            showConfirmButton: false,
            timer: 3000
        })
        document.getElementById("cbvn").setAttribute("hidden", "");
        document.getElementById("wbvn").removeAttribute("hidden");
        $(":input[type=submit]").prop("disabled", true);
    });
    </script>
    ';
    echo "NO INTERNET CONNECTION";
    } else {
        // echo $response;
        // make 
$obj = json_decode($response, TRUE);
$status = $obj['status'];
$msg = $obj['message'];
// repsonse working up.
$token = $obj['token'];
$unit = $obj['unit'];
$taxAmount = $obj['taxAmount'];
$bonusUnit = $obj['bonusUnit'];
$bonusToken = $obj['bonusToken'];
$disco = $obj['disco'];
$transId = $obj['transId'];
// make a move | qwerty
if ($status == "200" && $status != "") {
    // alright
    $cal_bal = $balance - $amount;
    $cal_with = $total_with + $amount;
    $digits = 9;
    $date = date("Y-m-d");
    $date2 = date('Y-m-d H:i:s');
    $randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    $trans = "TERA".$randms."DISCO".$int_id;
    // GD
    $update_transaction = mysqli_query($connection, "UPDATE account SET balance_derived = '$cal_bal', total_with = '$cal_with' WHERE account.user_id = '$user_id'");
    if ($update_transaction) {
        // WE ARE DONE
        $insert_transaction = mysqli_query($connection, "INSERT INTO `acct_transaction` (`user_id`, `transaction_id`, `transaction_type`, `amount`, `account_balance`, `credit`, `debit`, `transaction_date`) VALUES ('{$user_id}', '{$trans}', 'disco_purchase TOKEN: $token, Meter: $meter', '{$amount}', '{$cal_bal}', '0.00', '{$amount}', '{$date2}')");
         if ($insert_transaction) {
            //  go withdra
            echo '<script type="text/javascript">
    $(document).ready(function(){
        swal.fire({
            type: "success",
            title: "Paid - '.$msg.'",
            text: "TOKEN: '.$token.'",
            showConfirmButton: false,
            timer: 3000
        });
    });
    </script>
    ';
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
            text: "DATA ERROR",
            showConfirmButton: false,
            timer: 5000
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
                    title: "INSUFFICIENT FUND",
                    text: "REFILL YOUR WALLET",
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
                        text: "please enter your transaction password",
                        showConfirmButton: false,
                        timer: 3000
                    });
        });
     </script>
    ';
}
?>