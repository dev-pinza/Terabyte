<?php
$web_title = "Create Promotion";
include("header.php");
?>
<!-- START FROM HOME -->
<!-- <script src="..assets/libs/jquery/dist/jquery.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
<script>
//     setInterval(function() {
//         $(document).ready(function () {
//     // alert('I will appear every 4 seconds');
    // swal.fire({
    //         type: "success",
    //         title: "Account Created",
    //         text: "Thank you!",
    //         showConfirmButton: false,
    //         timer: 4000
    // });
//     // alert("HOLLA");
// });
// }, 3000);   // Interval set to 4 seconds

</script>
<!-- ALI -->
<style> 
  
.rangeslider{ 
    width: 100%; 
} 
  
.myslider { 
    -webkit-appearance: none; 
    background: #FCF3CF  ; 
    width: 100%; 
    height: 20px; 
    opacity: 2; 
   } 
  
  
.myslider::-webkit-slider-thumb { 
    -webkit-appearance: none; 
    cursor: pointer; 
    background: #34495E  ; 
    width: 5%; 
    height: 20px; 
} 
  
  
.myslider:hover { 
    opacity: 1; 
} 
  
</style> 
 <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                       <!-- ============================================================== -->
                    <!-- Example -->
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // BASIC DATAs
                        $client_id = $user_id;
                        // we are ready to start
                        $dest = $_POST["location"];
                        $fire = $_POST["webUrl3"];
                        $cat = $_POST["ad_cat"];
                        $head = $_POST["head"];
                        $title = $_POST["title"];
                        $body = $_POST["shortDescription"];
                        $aud_name = $_POST["aud_name"];
                        $age_gend = $_POST["wintType1"];
                        $int_loc = $_POST["int_loc"];
                        $auto_renew = $_POST["customRadio"];
                        // PICTURES
                        $temp1 = explode(".", $_FILES['chooseFile']['name']);
                        $digits = 10;
                        $randms1 = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                        $sig_passport_one = $randms1. '.' .end($temp1);
                        if (move_uploaded_file($_FILES['chooseFile']['tmp_name'], "ad_img/" . $sig_passport_one)) {
                        $msg = "Image uploaded successfully";
                        } else {
                          $msg = "Image Failed";
                        }
                       $mex = substr($sig_passport_one, -3);
                       if ($mex != "png" && $mex != "jpg" && $mex != "peg") {
                          $sig_passport_one = "av.jpg";
                        }
                        // POST LINK GEN
                        $digits = 5;
                        $randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                        $hitcode = $randms;
                        $trans = "TERA".$hitcode;
                        $post_link = strtok($aud_name, " ").$hitcode;
                        // now we will talk about Ad promotion tables AND the POST ID
                        $tot_rch = $_POST["total_reach"];
                        $tot_clk = $_POST["total_click"];
                        $tot_con = $_POST["total_conver"];
                        $tot_amt = $_POST["amount"];
                        // AD End date
                        $gen_date = date('Y-m-d');
                        $date2 = date('Y-m-d H:i:s');
                        $dura = $_POST["duration"];
                        // query to get client account
                        $actualend_date = date('Y-m-d', strtotime("+".$dura." days", strtotime($gen_date)));
                        // my liver
                        $get_client_account = mysqli_query($connection, "SELECT * FROM `account` WHERE user_id = '$user_id'");
                        $gca = mysqli_fetch_array($get_client_account);
                        $pre_bal = $gca["balance_derived"];
                        $pre_with = $gca["total_with"];
                        $tot_with = $pre_with + $tot_amt;
                        $tot_bal = $pre_bal - $tot_amt;
                        // get balance
                        if ($pre_bal >= $tot_amt) {
                            // make a move here
                            $get_available = mysqli_query($connection, "SELECT * FROM `client_post` WHERE post_link = '$post_link'");
                            $if = mysqli_num_rows($get_available);
                            if ($if <= 0) {
                                // do the update
                                $paid_promo = mysqli_query($connection, "UPDATE `account` SET `balance_derived` = '$tot_bal', `total_with` = '$tot_with' WHERE `account`.`user_id` = '$user_id'");
                                if ($paid_promo) {
                                    $insert_transaction = mysqli_query($connection, "INSERT INTO `acct_transaction` (`user_id`, `transaction_id`, `transaction_type`, `amount`, `account_balance`, `credit`, `debit`, `transaction_date`) VALUES ('{$user_id}', '{$trans}', 'ad creation', '{$tot_amt}', '{$tot_bal}', '0.00', '{$tot_amt}', '{$date2}')");
                                    if ($insert_transaction) {
                                        // move to the next thung
                                        $cli_post = mysqli_query($connection, "INSERT INTO `client_post` (`client_id`, `lunch_date`, `post_link`, `fire_link`, `destination`, `ad_category`, `ad_head`, `ad_sub_head`, `short_description`, `aud_name`, `age_gend`, `img`, `auto_renew`, `approval_status`, `end_date`, `days`) VALUES ('{$user_id}', '{$gen_date}', '{$post_link}', '{$fire}', '{$dest}', '{$cat}', '{$head}', '{$title}', '{$body}', '{$aud_name}', '{$age_gend}', '{$sig_passport_one}', '{$auto_renew}', '0', '{$actualend_date}', '{$dura}')");
                                        if ($cli_post) {
                                            // amonk
                                            $get_ava = mysqli_query($connection, "SELECT * FROM `client_post` WHERE post_link = '$post_link'");
                                            $er = mysqli_fetch_array($get_ava);
                                            $post_id = $er["id"];
                                            // alon
                                            $push_promotion = mysqli_query($connection, "INSERT INTO `ad_promotion` (`client_id`, `est_reach`, `est_click`, `est_con`, `aud_reach`, `tot_click`, `tot_con`, `budget_amount`, `used_amount`, `post_id`, `payment_status`, `shared`, `created_date`) VALUES ('{$user_id}', '{$tot_rch}', '{$tot_clk}', '{$tot_con}', '0', '0', '0', '{$tot_amt}', '0.00', '{$post_id}', 'active', '0', '{$gen_date}')");
                                            if ($push_promotion) {
                                                // transaction
                                                $promo_trans = mysqli_query($connection, "INSERT INTO `ad_transaction` (`transaction_id`, `client_id`, `transaction_type`, `amount`, `credit`, `debit`, `created_date`, `user_id`, `ip_address`) VALUES ('{$post_link}', '{$user_id}', 'ad credit', '{$tot_amt}', '{$tot_amt}', '0.00', '{$date2}', '{$user_id}', '0')");
                                                // check
                                                if ($promo_trans) {
                                                    // echo sometho
                                                    echo '
                        <script>
                        $(document).ready(function(){
                            swal.fire({
                                type: "success",
                                title: "Ad Successfully Created",
                                text: "Thank you! Ad Has been Posted for Review and Approval",
                                showConfirmButton: false,
                                timer: 3000
                        });
                        });
                        </script>
                        ';
                        $URL="active_promo.php";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                                                } else {
                                                    echo '
                                                <script>
                                                $(document).ready(function(){
                                                    swal.fire({
                                                        type: "error",
                                                        title: "System Error",
                                                        text: "Post Didnt Happen, Keep Calm call for Support You Have been Debited",
                                                        showConfirmButton: false,
                                                        timer: 7000
                                                });
                                                });
                                                </script>
                                                ';
                                                }
                                            } else {
                                                echo '
                                                <script>
                                                $(document).ready(function(){
                                                    swal.fire({
                                                        type: "error",
                                                        title: "System Error",
                                                        text: "Post Didnt Happen, Keep Calm call for Support You Have been Debited",
                                                        showConfirmButton: false,
                                                        timer: 7000
                                                });
                                                });
                                                </script>
                                                ';
                                            }
                                        } else {
                                            echo '
                                        <script>
                                        $(document).ready(function(){
                                            swal.fire({
                                                type: "error",
                                                title: "System Error",
                                                text: "Post Didnt Happen, Keep Calm call for Support You Have been Debited",
                                                showConfirmButton: false,
                                                timer: 7000
                                        });
                                        });
                                        </script>
                                        ';
                                        }
                                        // next
                                    } else {
                                        echo '
                                        <script>
                                        $(document).ready(function(){
                                            swal.fire({
                                                type: "error",
                                                title: "System Error",
                                                text: "Post Didnt Happen, Keep Calm call for Support You Have been Debited",
                                                showConfirmButton: false,
                                                timer: 7000
                                        });
                                        });
                                        </script>
                                        ';
                                    }
                                } else {
                                    echo '
                        <script>
                        $(document).ready(function(){
                            swal.fire({
                                type: "error",
                                title: "System Error",
                                text: "Post Didnt Happen, Call for Support",
                                showConfirmButton: false,
                                timer: 7000
                        });
                        });
                        </script>
                        ';
                                }
                            } else {
                                echo '
                        <script>
                        $(document).ready(function(){
                            swal.fire({
                                type: "error",
                                title: "Post already exist",
                                text: "sorry it seems this post exist",
                                showConfirmButton: false,
                                timer: 3000
                        });
                        });
                        </script>
                        ';
                        $URL="create_promotion.php";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                            }
                            // out
                        } else {
                            // qwerty
                            echo '
                        <script>
                        $(document).ready(function(){
                            swal.fire({
                                type: "error",
                                title: "Insufficient Fund",
                                text: "Refill your Tera-wallet",
                                showConfirmButton: false,
                                timer: 3000
                        });
                        });
                        </script>
                        ';
                        $URL="client_bal.php";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                            // throw an error here
                        }
                        // calculate balance
                        
                        // take cash to ad promotion
                        // record cash
                        // update
                    }
                    ?>
                    <!-- ============================================================== -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body wizard-content">
                                <h4 class="card-title">Promote your Business</h4>
                                <h6 class="card-subtitle">create a promoted AD</h6>
                                <form method="POST" id="dman_sub" class="validation-wizard wizard-circle mt-5" enctype="multipart/form-data">
                                    <!-- Step 1 -->
                                    <h6>Step 1 - Destination</h6>
                                    <section>
                                        <div class="row"> 
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2"> Select Destination : <span class="danger">*</span> </label>
                                                    <select class="custom-select form-control required" id="wlocation2" name="location">
                                                        <option value="1">Social Media (Whatsapp, Instagram, Facebook, +3 others)</option>
                                                        <option value="2">Website & Blog</option>
                                                        <option value="3">Instance Message</option>
                                                        <option value="4">Payment Page</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2"> Fire-Link Address : <span class="danger">*</span> </label>
                                                    <input type="url" class="form-control required" value="https://" id="webUrl3" name="webUrl3"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Ad Image Path(Encrypted)</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="chooseFile" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2"> Ad Category : <span class="danger">*</span> </label>
                                                    <select class="custom-select form-control required" id="wlocation2" name="ad_cat">
                                                        <option value="1">Finance & Investment</option>
                                                        <option value="2">Transportation</option>
                                                        <option value="3">Software/Computer & Eletronic Gadget</option>
                                                        <option value="4">E-commerce</option>
                                                        <option value="5">Education</option>
                                                        <option value="6">Health/Skin Care & Pharmacecutical</option>
                                                        <option value="7">Food & Agriculture</option>
                                                        <option value="8">Entertainment & Music</option>
                                                        <option value="9">News & Media</option>
                                                        <option value="10">Manufacturing</option>
                                                        <option value="11">Energy and Power</option>
                                                        <option value="12">Mining</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Step 2 - Ad Content</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle2">Ad Heading :</label>
                                                    <input type="text" name="head" class="form-control required" id="jobTitle2">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="webUrl3">Ad Sub-Heading :</label>
                                                    <input type="text" name="title" class="form-control required" id="jobTitle2"> </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shortDescription3">Short Description :</label>
                                                    <textarea name="shortDescription" id="shortDescription3" rows="6" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Step 3 - Audience</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wint1">Audience Name :</label>
                                                    <input type="text" class="form-control required" name="aud_name" id="wint1"> </div>
                                                <div class="form-group">
                                                    <label for="wintType1">Age & Gender :</label>
                                                    <select class="custom-select form-control required" id="wintType1" data-placeholder="Type to search cities" name="wintType1">
                                                        <option value="0">All</option>
                                                        <option value="1">All | 18 +</option>
                                                        <option value="2">MALE | 18 +</option>
                                                        <option value="3">FEMALE | 18 +</option>
                                                        <option value="4">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <?php
                                                    $digits = 9;
                                                    $randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                                                    $cache_id = $randms;
                                                    $_SESSION["cache_id"] = $cache_id;
                                                    // random ID
                                                    ?>
                                                    <div id="hide_later">
                                                    <?php
function fill_in($connection)
{
    $get_cache = mysqli_query($connection, "SELECT * FROM `institution` WHERE active = '1'");
    $output = '';
    while($rowx = mysqli_fetch_array($get_cache)) {
        $output .= '<option value = "'.$rowx["id"].'"> '.strtoupper($rowx["name"]).' </option>';
    }
return $output;
}
?>
<label for="wLocation1">Campus Location :</label>
<select class="custom-select form-control required" id="wLocation1" name="int_loc">
    <option value="all">All</option>
<?php 
// echo fill_in($connection) 
?>
</select>
                                                    </div>
                                                   <!-- <div id="show_int"></div> -->
                                                </div>
                                            </div>
                                            <input type="text" value="<?php echo $cache_id; ?>" id ="cache_id" hidden>
<script>
$(document).ready(function () {
             $('#wLocation1').on("change", function () {
               var c_id = $('#cache_id').val();
               var int_id = $('#wLocation1').val();
                if (int_id != "all") {
                    $.ajax({
                 url: "ajax_post/aud_show.php",
                 method: "POST",
                 data:{c_id:c_id, int_id:int_id},
                 success: function (data) {
                   $('#aud_rec').html(data);
                 }
               });
                }
             });
           });                
</script>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div id="aud_rec"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Auto Renew:</label>
                                                    <div class="c-inputs-stacked">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadio16" value="1" name="customRadio" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio16">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadio17" value="0" name="customRadio" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio17">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Step 4 - Budget & Duration</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Budget - NGN <span id="demo" >1500</span> (Amount Due - NGN <span id="amt_due">1500</span>) </h4>
                                <div class="form-group">
                                <div class="rangeslider"> 
                                    <input type="range" min="1500" max="500000" value="1500"
                                    class="myslider" id="sliderRange">
                                </div> 
                                </div>
                                <h4 class="card-title">Duration - <span id="demoa">0</span> Day(s)</h4>
                                <div class="form-group">
                                <div class="rangeslider">
                                    <input type="range" min="1" max="30" value="1"
                                    class="myslider" id="sliderRangea" name="duration">
                                </div> 
                                </div>
                                <div class="form-group">
                                <input type="text" value="1818" name="total_reach" id="tot_rch" hidden>
                                <input type="text" value="727" name="total_click" id="clk" hidden>
                                <input type="text" value="364" name="total_conver" id="cnv" hidden>
                                <input type="number" value="1500" name="amount" id="cash_paid" hidden>
                                </div>
                            </div>
                            <script> 
                            var rangeslider = document.getElementById("sliderRange");
                            var output = document.getElementById("demo");
                            var qamt = document.getElementById("amt_due");
                            var calc_reach = document.getElementById("est_reach");
                            var calc_click = document.getElementById("clicks");
                            var calc_conv = document.getElementById("conversion");
                            // aiit
                            // AIIT
                            output.innerHTML = rangeslider.value; 
                            rangeslider.oninput = function() { 
                            output.innerHTML = this.value; 
                            // GET Min Aud
                            var x = 50;
                            // Total No of Rep
                            var y = 2000;
                            // Total Conversion
                            var z = 10000;
                            // Min ad Amt
                            var a = 1500;
                            // D Dura  
                            var d = document.getElementById("sliderRangea").value;
                            // Budget amt.
                            var ba = document.getElementById("sliderRange").value;
                            // DO THE MATHS
                            var fst = ((ba / a) * x) * d;
                            var snd = fst - (y + z);
                            if ( snd < fst) {
                                Reach = snd * 0.7;
                            } 
                            else if (snd >= fst) {
                                Reach = snd + (y + z);
                            }
                            Max_r  = Reach + (y + z);
                            if (d < 7 && ba < 500000) {
                                Max_r = Max_r * 0.5;
                            }
                            // showing
                            var amount_due = d * ba;
                            // end
                            calc_reach.innerHTML = Math.round(Max_r);
                            calc_click.innerHTML = Math.round(Max_r * 0.4);
                            calc_conv.innerHTML = Math.round(Max_r * 0.2);
                            qamt.innerHTML = amount_due;
                            // geting amount
                            $('#tot_rch').val(Math.round(Max_r));
                            $('#clk').val(Math.round(Max_r * 0.4));
                            $('#cnv').val(Math.round(Max_r * 0.2));
                            $('#cash_paid').val(amount_due);
                            }
                            </script>
                             <script> 
                            var rangeslidera = document.getElementById("sliderRangea"); 
                            var outputa = document.getElementById("demoa"); 
                            var qamt = document.getElementById("amt_due");
                            var calc_reach = document.getElementById("est_reach");
                            var calc_click = document.getElementById("clicks");
                            var calc_conv = document.getElementById("conversion");
                            outputa.innerHTML = rangeslidera.value; 
                            rangeslidera.oninput = function() { 
                            outputa.innerHTML = this.value; 
                            // GET Min Aud
                            var x = 50;
                            // Total No of Rep
                            var y = 2000;
                            // Total Conversion
                            var z = 10000;
                            // Min ad Amt
                            var a = 1500;
                            // D Dura  
                            var d = document.getElementById("sliderRangea").value;
                            // Budget amt.
                            var ba = document.getElementById("sliderRange").value;
                            // DO THE MATHS
                            // we good
                            var fst = ((ba / a) * x) * d;
                            var snd = fst - (y + z);
                            if ( snd < fst) {
                                Reach = snd * 0.7;
                            } 
                            else if (snd >= fst) {
                                Reach = snd + (y + z);
                            }
                            Max_r  = Reach + (y + z);
                            if (d < 7 && ba < 500000) {
                                Max_r = Max_r * 0.5;
                            }
                            // amount
                            var amount_due = d * ba;
                            // done with
                            calc_reach.innerHTML = Math.round(Max_r);
                            calc_click.innerHTML = Math.round(Max_r * 0.4);
                            calc_conv.innerHTML = Math.round(Max_r * 0.2);
                            qamt.innerHTML = amount_due;
                            // showing
                            $('#tot_rch').val(Math.round(Max_r));
                            $('#clk').val(Math.round(Max_r * 0.4));
                            $('#cnv').val(Math.round(Max_r * 0.2));
                            $('#cash_paid').val(amount_due);
                            // $('#amt_due').val(amount_due);
                            // DATE
                            } 
                            </script>
                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="card">
                                                <!-- incalculating, you need MIN REACH, NO of Rep -->
                                <div class="card-body text-center">
                                    <h4 class="text-center text-info">Est. Reach</h4>
                                    <h2> <span id="est_reach">1818</span> </h2>
                                    <div class="row pt-2 pb-2">
                                        <!-- Column -->
                                        <div class="col text-center align-self-center">
                                            <div data-label="100%" class="css-bar mb-0 css-bar-primary css-bar-100"><i class="display-6 mdi mdi-account-circle"></i></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <h4 class="font-medium mb-0"><i class="ti-angle-up text-success"></i> <br> clicks <span id="clicks">727</span> </h4>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <h4 class="font-medium mb-0"><i class="ti-angle-down text-danger"></i> <br> conversion <span id="conversion">364</span> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Example -->
                    <!-- ============================================================== -->
                </div>
            </div>
<?php
include("footer.php");
?>
<script>
    //Basic Example
    $("#example-basic").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true
    });

    // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    });

    // Advance Example

    var form = $("#example-advanced-form").show();

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                form.steps("previous");
            }
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password-2"
            }
        }
    });

    // Dynamic Manipulation
    $("#example-manipulation").steps({
        headerTag: "h3",
        bodyTag: "section",
        enableAllSteps: true,
        enablePagination: false
    });

    //Vertical Steps

    $("#example-vertical").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical"
    });

    //Custom design form example
    $(".tab-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onFinished: function(event, currentIndex) {
            swal.fire("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");

        }
    });


    var form = $(".validation-wizard").show();

    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function(event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function(event, currentIndex) {
            let timerInterval
Swal.fire({
  title: 'Processing!',
  html: 'Please Wait! <b></b> .',
  timer: 2000,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
  document.getElementById("dman_sub").submit();
})
// HERE I WILL HAVE MY AJAX
// HERE I WILL END MY AJAX
        }
    }), $(".validation-wizard").validate({
        ignore: "input[type=hidden]",
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element)
        },
        rules: {
            email: {
                email: !0
            }
        }
    })
    </script>