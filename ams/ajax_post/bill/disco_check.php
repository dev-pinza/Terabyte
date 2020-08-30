<?php
// making a good move
include("../../../function/db/connect.php");
// porty
session_start();
$user_id = $_SESSION["id"];
$disco = $_POST["disco"];
$meter = $_POST["meter"];
$dis_type = $_POST["dis_type"];
// MAD
$digits = 9;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
// end the code
// end
if ($disco != "" && $meter != "" && $user_id != "") {
    // finnin
    $sql_fund = mysqli_query($connection, "SELECT * FROM account WHERE account.user_id = '$user_id'");
                $qw = mysqli_fetch_array($sql_fund);
                $balance = $qw["balance_derived"];
                $total_with = $qw["total_with"];
        // test
        if ($balance == $balance) {
            // STAT API
            // END THE APU HERE
            // CHECK FOR THE BEGINNING
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
  CURLOPT_POSTFIELDS =>"{\r\n\"serviceCode\" : \"AOV\",\r\n\"disco\" : \"$disco\",\r\n\"meterNo\": \"$meter\",\r\n\"type\" : \"$dis_type\"\r\n}",
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
// $msg = $obj['message'];
$customer = $obj['customerName'];
$customerAddress = $obj['customerAddress'];
$customerDistrict = $obj['customerDistrict'];
$phoneNumber = $obj['phoneNumber'];
// make a move
if ($status == "200" && $status != "") {
        // echo $someArray[0]["code"];
    ?>
    <div class="row">
    <div class="col-md-12">
            <div class="form-group">
               <label class="bmd-label-floating" >Amount</label>
               <input type = "text" value="" id="amount"  class="form-control" name = ""/>
              </div>
    </div>
    <div class="col-md-12">
            <div class="form-group">
               <label class="bmd-label-floating" >Customer Name</label>
               <input type = "text" style="color: black;" value="<?php echo $customer ?>" id="name" class="form-control" name = "" readonly/>
              </div>
    </div>
    <!-- ow te script -->
    <div class="col-md-12">
            <div class="form-group">
               <label class="bmd-label-floating" >Customer Phone</label>
               <input type = "text"  value="<?php echo $phoneNumber ?>" id="phonenumber" class="form-control" name = ""/>
              </div>
    </div>
    <!-- DATA respomze -->
    <div class="col-md-12">
            <div class="form-group">
               <label class="bmd-label-floating" >Customer Address</label>
               <input type = "text" value="<?php echo $customerAddress ?>" id="customerAddress" class="form-control" name = ""/>
              </div>
    </div>
    </div>
    <?php
    
} else {
    echo "Finding User..." ;
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