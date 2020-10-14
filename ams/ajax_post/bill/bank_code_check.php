<?php
// making a good move
include("../../../function/db/connect.php");
// porty
session_start();
$user_id = $_SESSION["id"];
$acct_no = $_POST["acct"];
// MAD
$digits = 9;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
// end the code
// end
if ($user_id != "") {
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
  CURLOPT_URL => "https://api.paystack.co/bank",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Cookie: __cfduid=d9fc80d8dc6029f851e20343dfcc8ab971602676119; sails.sid=s%3AjhSRIjOj3rYk0ZDRyVt0UJgDYPdrcF29.GodLtV08HtX%2FuYFY0sZVDQCEgTidj1iaKbLsmpqnqLA"
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
$product = $obj['data'];
// make a move
$me = json_encode($product);
if ($status == true && $status != "") {
        // echo $someArray[0]["code"];
    ?>
    <div id="bank_ress"></div>
    <select id="see_bank" class="form-control" style="text-transform: uppercase;">
        <option value="">SELECT BANK</option>
    <?php
    $someArray = json_decode($me, true);
    foreach ($someArray as $key => $value) {
            echo "<option value=".$value["code"]." style='color: black;' > " . " ". $value["name"].  "</option>";
          }
          ?>
    </select>
    <!-- ow te script -->
    <script>
                $(document).ready(function() {
                                $('#see_bank').on("change", function() {
                                  var bank_data = $('#see_bank').val();
                                    $.ajax({
                                      url:"ajax_post/bill/bank_code.php",
                                      method:"POST",
                                      data:{bank_data:bank_data},
                                      success:function(data){
                                      $('#bank_ress').html(data);
                                    }
                                  });
                                });
                              });
                            </script>
    <!-- DATA respomze -->
    
    <?php
    
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
?>