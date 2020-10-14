<?php
// making a good move
include("../../../function/db/connect.php");
// porty
session_start();
$user_id = $_SESSION["id"];
$account_no = $_POST["account_no"];
$bank_code = $_POST["bank_code"];
// MAD
$digits = 9;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
// end the code
// end
if ($user_id != "" && $account_no != "" && $bank_code != "") {
    // finnin
    $sql_fund = mysqli_query($connection, "SELECT * FROM account WHERE account.user_id = '$user_id'");
    $qw = mysqli_fetch_array($sql_fund);
    $balance = $qw["balance_derived"];
    $total_with = $qw["total_with"];
        // test
        if ($balance == $balance) {
            // STAT API
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=$account_no&bank_code=$bank_code",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_live_7d955ca9d1f7814b697b4d10463d6853a5a48a0d",
                "Cache-Control: no-cache",
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
$account_number = $obj['data']['account_number'];
$account_name = $obj['data']['account_name'];
// make a move
if ($status == true && $status != "" && $account_name != "Not found") {
        // echo $someArray[0]["code"];
    ?>
    <p>Account Name: <?php echo $account_name ?></p>
    <p>Account No: <?php echo $account_number ?></p>
    <!-- ow te script -->
               <script>
                $(document).ready(function() {
                    $("#bank_payment").prop("disabled", false);
                              });
                            </script>
    <!-- DATA respomze -->
    <?php 
    $url = "https://api.paystack.co/transferrecipient";
    $fields = [
      'type' => "nuban",
      'name' => "$account_name",
      'account_number' => "$account_no",
      'bank_code' => "$bank_code",
      'currency' => "NGN"
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
    $obj = json_decode($result, TRUE);
$status = $obj['status'];
$msgn = $obj['message'];
$data_id = $obj['data']['id'];
$data_integration = $obj['data']['integration'];
$name = $obj['data']['name'];
$recipient_code = $obj['data']['recipient_code'];
$data_account_number = $obj['data']['details']['account_number'];
$data_account_name = $obj['data']['details']['account_name'];
$data_bank_code = $obj['data']['details']['bank_code'];
$data_bank_name = $obj['data']['details']['bank_name'];
$rec_time = date('Y-m-d H:i:s');
// make a move
$_SESSION["recipient_code"] = $recipient_code;
// code
if ($status == true && $recipient_code != "") {
    $query_insert_trns = mysqli_query($connection, "INSERT INTO `payout_transaction` (`user_id`, `data_id`, `data_integration`, `name`, `recipient_code`, `account_number`, `account_name`, `bank_code`, `bank_name`, `amount`, `transaction_date`, `payment_status`) VALUES ('{$user_id}', '{$data_id}', '{$data_integration}', '{$name}', '{$recipient_code}', '{$data_account_number}', '{$data_account_name}', '{$data_bank_code}', '{$data_bank_name}', '0.0000', '{$rec_time}', 'Not Paid')");
    if ($query_insert_trns) {
        // the next move
        ?>
        <script type="text/javascript">
    $(document).ready(function(){
        document.getElementById("acct_no").readOnly = true;
    });
    </script>
    <input type="text" id="recipient_code" value="<?php echo $recipient_code; ?>" hidden>
    <?php
    } else {
        echo '<script type="text/javascript">
    $(document).ready(function(){
        swal.fire({
            type: "error",
            title: "Error Message - '.$msgn.'",
            text: "Something is Wrong (*_*)",
            showConfirmButton: false,
            timer: 5000
        });
    });
    </script>
    ';
    }
}
    ?>
    <!-- MAKE MOVE -->
    <?php
    // END 
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
    ?>
    <script>
                $(document).ready(function() {
                    $("#bank_payment").prop("disabled", true);
                              });
                            </script>
    <?php
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
?>