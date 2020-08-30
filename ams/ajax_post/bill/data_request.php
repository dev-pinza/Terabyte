<?php
// making a good move
include("../../../function/db/connect.php");
// porty
session_start();
$user_id = $_SESSION["id"];
$network = $_POST["net"];
$phone = $_POST["phone"];
// MAD
$digits = 9;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
// end the code
// end
if ($network != "" && $phone != "" && $user_id != "") {
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
    // CURLOPT_URL => "http://34.68.51.255/shago/public/api/test/b2b",
  CURLOPT_URL => "https://shagopayments.com/api/live/b2b",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\r\n\"serviceCode\" : \"VDA\",\r\n\"phone\" : \"$phone\",\r\n\"network\": \"$network\"\r\n}",
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
$product = $obj['product'];
// make a move
$me = json_encode($product);
if ($status == "200" && $status != "") {
        // echo $someArray[0]["code"];
    ?>
    <label>Date Plan <div id="data_ress"></div></label>
    <select id="see" class="form-control" style="text-transform: uppercase;">
        <option value="">SELECT DATA PLAN</option>
    <?php
    $someArray = json_decode($me, true);
    foreach ($someArray as $key => $value) {
            echo "<option value=".$value["allowance"].":".$value["code"].":".$value["price"]." style='color: black;' > " . " ". $value["allowance"] ." &#8358;". number_format($value["price"], 2) . " TERM: ". $value["validity"] . "</option>";
          }
          ?>
    </select>
    <!-- ow te script -->
    <script>
                $(document).ready(function() {
                                $('#see').on("change", function() {
                                  var datac = $('#see').val();
                                    $.ajax({
                                      url:"ajax_post/bill/data_res.php",
                                      method:"POST",
                                      data:{datac:datac},
                                      success:function(data){
                                      $('#data_ress').html(data);
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