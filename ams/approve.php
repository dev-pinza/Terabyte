<?php
$web_title = "Ad Details";
include("header.php");
?>
 <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <?php
                if(isset($_GET["no"]) && $usertype = "man") {
                    $post_id = $_GET["no"];
                    $person = mysqli_query($connection, "SELECT * FROM `client_post` WHERE post_link = '$post_id'");
                    $n = mysqli_fetch_array($person);
                    // display result
                    $pid = $n["id"];
                    $promotion_query = mysqli_query($connection, "SELECT * FROM `ad_promotion` WHERE post_id = '$pid'");
                    $ppq = mysqli_fetch_array($promotion_query);
                    $aud_rch = $ppq["aud_reach"];
                    $aud_clk = $ppq["tot_click"];
                    $aud_con = $ppq["tot_con"];
                    $aud_share = $ppq["shared"] + 1;
                    $budget_amt = $ppq["budget_amount"];
                    $used_amt = $ppq["used_amount"];
                    $pay_stat = $ppq["payment_status"];
                    $gen_date = date('Y-m-d');
                    $gen_date1 = date('Y-m-d H:i:s');
                    // OYA
                    $digits = 7;
    $trans = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    // jj
                    $man_query = mysqli_query($connection, "SELECT * FROM `man_approval` WHERE post_link = '$post_id' AND int_id = '$int_id'");
                    $mq = mysqli_num_rows($man_query);
                    if ($mq <= 0) {
                        // aiit
                        $post_man = mysqli_query($connection, "INSERT INTO `man_approval` (`man_id`, `int_id`, `post_link`) VALUES ('{$user_id}', '{$int_id}', '{$post_id}')");
                        if ($post_man) {
                            // take a share and take earning
                            $bod_share = $budget_amt * (20/100);
                           // get PRO 20%
                          $pro_share = $budget_amt * (20/100);
                        //   ONE OFF
                        $select_oneoff = mysqli_query($connection, "SELECT * FROM `tera_profit` WHERE post_link = '$post_id'");
                        if (mysqli_num_rows($select_oneoff) <= 0) {
                            // make amove
                            $insert_ad = mysqli_query($connection, "INSERT INTO `tera_profit` (`bod`, `profit`, `total`, `post_link`) VALUES ('{$bod_share}', '{$pro_share}', '{$budget_amt}', '{$post_id}')");
                            if ($insert_ad) {
                                // open tera byte account
                                $acct_earn = mysqli_query($connection, "SELECT * FROM users WHERE usertype = 'super' AND is_disabled = '0'");
                                $xx = mysqli_num_rows($acct_earn);
                                $bod_earn = $bod_share / $xx;
                                $gen_earn = ($bod_share + $pro_share) + $used_amt;
                                while ($ae = mysqli_fetch_array($acct_earn)) {
                                    // check
                                    $s_id = $ae["id"];
                                    $sel_acct = mysqli_query($connection, "SELECT * FROM `account` WHERE user_id = '$s_id'");
                                    $aq1 = mysqli_fetch_array($sel_acct);
                                    $tot_dep = $aq1["total_dep"] + $bod_earn;
                                    $tot_bal  = $aq1["balance_derived"] + $bod_earn;
                                    $update_rep = mysqli_query($connection, "UPDATE `account` SET `balance_derived` = '$tot_bal', `total_dep` = '$tot_dep' WHERE `account`.`user_id` = '$s_id'");
                                    if ($update_rep) {
                                        $update_rep_trans = mysqli_query($connection, "INSERT INTO `acct_transaction` (`user_id`, `transaction_id`, `transaction_type`, `amount`, `account_balance`, `credit`, `debit`, `transaction_date`) VALUES ('{$s_id}', '{$trans}', 'bod earning', '{$bod_earn}', '{$tot_bal}', '{$bod_earn}', '0.00', '{$gen_date1}')");
                                        // we are done
                                    } else {
                                        echo "error 478";
                                    }
                                }
                                // add it here
                                $update_pro = mysqli_query($connection, "UPDATE `ad_promotion` SET `used_amount` = '$gen_earn', shared = '$aud_share' WHERE `ad_promotion`.`post_id` = '$pid'");
                                if ($update_pro) {
                                    $update_trans = mysqli_query($connection, "INSERT INTO `ad_transaction` (`transaction_id`, `client_id`, `transaction_type`, `amount`, `credit`, `debit`, `created_date`, `user_id`, `ip_address`, `int_id`) VALUES ('{$trans}', '0', 'bod debit', '{$gen_earn}', '0.00', '{$gen_earn}', '{$gen_date1}', '{$s_id}', '0', '{$int_id}')");
                                    if ($update_trans) {
                                        echo header("location: ad_man.php");
                                        echo '
                                        <script>
                                        $(document).ready(function(){
                                            swal.fire({
                                                type: "success",
                                                title: "Approved Successfully",
                                                text: "Thank you! Ad Has been Processed to Reps",
                                                showConfirmButton: false,
                                                timer: 3000
                                        });
                                        });
                                        </script>
                                        ';
                                        $URL="ad_man.php";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                                    } else {
                                        echo "error 111";
                                    }
                                } else {
                                    echo "error 479";
                                }
                                // add it here
                                // make move
                            } else {
                                echo "SYSTEM ERROR IN AD";
                            }
                        } else {
                            // echo "OK NOEW" MAKE A MOVE TO ADD TO 
                            echo "ALRIGHT";
                           echo '
                                        <script>
                                        $(document).ready(function(){
                                            swal.fire({
                                                type: "success",
                                                title: "Approved Successfully",
                                                text: "Thank you! Ad Has been Processed to Reps",
                                                showConfirmButton: false,
                                                timer: 3000
                                        });
                                        });
                                        </script>
                                        ';
                                        $URL="ad_man.php";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                        }
                        } else {
                            echo "SYSTEM ERROR";
                        }
                    } else {
                        echo header("location: ad_man.php");
                    }
                ?>
                    <div class="col-lg-12">
                    <?php
                } else {
                    ?>
                    <h1>404 ERROR</h1>
                    <?php
                }
                   ?>
                    <!-- Column -->
                </div>
                </div>
<?php
include("footer.php");
?>