<?php
include("../function/db/connect.php");
// a db connection
if (isset($_GET["no"]) && isset($_GET["harsh"])) {
    // give it a link push
    $post_link = $_GET["no"];
    $rep_id = $_GET["harsh"];
    $digits = 7;
    $trans = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    // select * from users check a usertype
    $sel_rep = mysqli_query($connection, "SELECT * FROM `users` WHERE id='$rep_id'");
    $o = mysqli_fetch_array($sel_rep);
    $user_id = $o["id"];
    $is_dis = $o["is_disabled"];
    $int_id = $o["int_id"];
    $user_type = $o["usertype"];
    // if the user has been disabled
    $query_share ="";
    $mysqli_ccc = mysqli_query($connection, "SELECT * FROM client_post WHERE post_link = '$post_link'");
    if (mysqli_num_rows($mysqli_ccc) >= 1) {
    // check
    if ($is_dis == "0" && $user_type == "rep" || $user_type == "man") {
        // making a  move  with URL https
        function getIPAddress() {
            //whether ip is from the share internet  
             if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
                }  
            //whether ip is from the proxy  
            else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
             }  
          //whether ip is from the remote address  
            else{  
                    $ip = $_SERVER['REMOTE_ADDR'];  
             }  
             return $ip;  
          } 
          $ip = getIPAddress();
          $getip = mysqli_query($connection, "SELECT * FROM `ad_transaction` WHERE ip_address = '$ip' AND post_id = '$post_link'");
        // select user account
        if (mysqli_num_rows($getip) <= 0) {
            // done making a move
            $acct_query = mysqli_query($connection, "SELECT * FROM `account` WHERE user_id = '$user_id'");
            $aq = mysqli_fetch_array($acct_query);
            $tot_dep = $aq["total_dep"];
            $tot_bal  = $aq["balance_derived"];
            // NO TOT MAN
            $sel_rep = mysqli_query($connection, "SELECT * FROM `users` WHERE usertype = 'man'");
            $man_count = mysqli_num_rows($sel_rep);
            // YOU NEED TO CALL THE MANAGER WHO APPROVED HERE
            $man_query = mysqli_query($connection, "SELECT * FROM `man_approval` WHERE post_link = '$post_link' AND int_id = '$int_id' ORDER BY id ASC LIMIT 1");
            $mq = mysqli_fetch_array($man_query);
            $int_id = $mq["int_id"];
            $man_id = $mq["man_id"];
            // open manager's account
            // OPEN SPACE FOR SENOIR MANAGERS
            $acct1_query = mysqli_query($connection, "SELECT * FROM `account` WHERE user_id = '$man_id'");
            $aq1 = mysqli_fetch_array($acct1_query);
            $man_tot_dep = $aq1["total_dep"];
            $man_tot_bal  = $aq1["balance_derived"];
            // YOU NEED THE TABLE FOR THAT PARTICULALR POST
            $post_query = mysqli_query($connection, "SELECT * FROM `client_post` WHERE post_link = '$post_link'");
            $pq = mysqli_fetch_array($post_query);
            $p_id = $pq["id"];
            $client_id = $pq["client_id"];
            $fire_link = $pq["fire_link"];
            $ap_status = $pq["approval_status"];
            $ad_end_date = $pq["end_date"];
            $days = $pq["days"];
            // promo
            $promotion_query = mysqli_query($connection, "SELECT * FROM `ad_promotion` WHERE post_id = '$p_id'");
            $ppq = mysqli_fetch_array($promotion_query);
            $est_rch = $ppq["est_reach"];
            $est_clk = $ppq["est_click"];
            $est_con = $ppq["est_con"];
            $aud_rch = $ppq["aud_reach"];
            $aud_clk = $ppq["tot_click"];
            $aud_con = $ppq["tot_con"];
            $budget_amt = $ppq["budget_amount"];
            $used_amt = $ppq["used_amount"];
            $pay_stat = $ppq["payment_status"];
            // get the promotion\
            $gen_date = date('Y-m-d');
            $gen_date1 = date('Y-m-d H:i:s');
            // select * from the post
            function add_up($connection, $aud_clk, $aud_con, $aud_rch) {
                // here we will add up
                // stop here
            }
            // make an add up function
            if ($ad_end_date >= $gen_date && $pay_stat == "active" || $pay_stat == "Active" && $ap_status == "1") {
                // if the post is active and approved
                $query_share = mysqli_query($connection, "SELECT * FROM `payroll_management` ORDER BY id ASC LIMIT 1");
                if (mysqli_num_rows($query_share) > 0) {
                    $ds = mysqli_fetch_array($query_share);
                $rep_per = $ds["rep_per"];
                $man_per = $ds["man_per"];
                } else {
                    $rep_per = 50;
                    $man_per = 10;
                }
                // get reps 50%
                $rep_share = $budget_amt * ($rep_per/100);
                // get Man 10%
                $man_share = $budget_amt * ($man_per/100);
                // get BOD  20%
                // $bod_share = $budget_amt * (20/100);
                // get PRO 20%
                // $pro_share = $budget_amt * (20/100);
                // est reach
                if ($used_amt <= $budget_amt) {
                    // done process
                    $each_earn = ($rep_share / $est_rch * 10);
                    $each_man_earn = ($man_share / $est_rch) / $man_count;
                    // test each earn
                    $check_rep_out = $used_amt + $each_earn;
                    $check_man_out = $check_rep_out + $each_man_earn;
                    if ($each_earn <= $check_rep_out && $rep_id != "" || $rep_id != 0) {
                        // update
                        $rep_bal = $tot_bal + $each_earn;
                        $rep_dep = $tot_dep + $each_earn;
                        $update_rep = mysqli_query($connection, "UPDATE `account` SET `balance_derived` = '$rep_bal', `total_dep` = '$rep_dep' WHERE `account`.`user_id` = '$user_id'");
                        if ($update_rep) {
                            // rep transaction
                            $update_rep_trans = mysqli_query($connection, "INSERT INTO `acct_transaction` (`user_id`, `transaction_id`, `transaction_type`, `amount`, `account_balance`, `credit`, `debit`, `transaction_date`) VALUES ('{$rep_id}', '{$trans}', 'rep earning', '{$each_earn}', '{$rep_bal}', '{$each_earn}', '0.00', '{$gen_date1}')");
                            if ($update_rep_trans) {
                                // UPDATE THE POST
                                $pro_rch = $aud_rch + 1;
                                $pro_clk = $aud_clk + 1;
                                $pro_con = $aud_con + 1;
                                // insert into POST TRANS
                                $update_pro = mysqli_query($connection, "UPDATE `ad_promotion` SET `used_amount` = '$check_rep_out', `aud_reach` = '$pro_rch', `tot_click` = '$pro_clk', `tot_con` = '$pro_con', shared = '$pro_clk' WHERE `ad_promotion`.`post_id` = '$p_id'");
                                if ($update_pro) {
                                    // oya o
                                    $update_trans = mysqli_query($connection, "INSERT INTO `ad_transaction` (`transaction_id`, `client_id`, `transaction_type`, `amount`, `credit`, `debit`, `created_date`, `user_id`, `ip_address`, `int_id`) VALUES ('{$trans}', '{$client_id}', 'rep debit', '{$each_earn}', '0.00', '{$each_earn}', '{$gen_date1}', '{$rep_id}', '{$ip}', '{$int_id}')");
                                    // thinking
                                } else {
                                    echo "A PROBLEM";
                                }
                            } else {
                                echo "A PROBLEM";
                            }
                            // alright
                        } else {
                            echo "A PROBLEM";
                        }
                    } else {
                        echo add_up($connection, $aud_clk, $aud_con, $aud_rch);
                    }
                    // HERE WE WILL DROP A FUNCTION TO ROLL
                    // END FUNCTION
                    if ($each_man_earn <= $check_man_out && $man_id != 0) {
                        // update
                        $man_bal = $man_tot_bal + $each_man_earn;
                        $man_dep = $man_tot_dep + $each_man_earn;
                        // check if the person is a manager
                        $query_manc = mysqli_query($connection, "SELECT * FROM users WHERE id = '$rep_id'");
                        $ut = mysqli_fetch_array($query_manc);
                        $usert = $ut["usertype"];
                        // check if the id is man
                        if ($usert == "man") {
                            $man_bal = $man_bal + $each_earn;
                            $man_dep = $man_dep + $each_earn;
                        } else {
                            $man_bal = $man_bal;
                        }
                        // end check if the person is a manager
                        $update_man = mysqli_query($connection, "UPDATE `account` SET `balance_derived` = '$man_bal', `total_dep` = '$man_dep' WHERE `account`.`user_id` = '$man_id'");
                        if ($update_man) {
                            // rep transaction
                            $update_man_trans = mysqli_query($connection, "INSERT INTO `acct_transaction` (`user_id`, `transaction_id`, `transaction_type`, `amount`, `account_balance`, `credit`, `debit`, `transaction_date`) VALUES ('{$man_id}', '{$trans}', 'man earning', '{$each_man_earn}', '{$man_bal}', '{$each_man_earn}', '0.00', '{$gen_date1}')");
                            // alright
                            if ($update_man_trans) {
                                $pro_rch = $aud_rch + 2;
                                $pro_clk = $aud_clk + 1;
                                $pro_con = $aud_con + 1;
                                $check_man_out_1 = $check_man_out;
                                // insert into POST TRANS
                                $update_pro = mysqli_query($connection, "UPDATE `ad_promotion` SET `used_amount` = '$check_man_out_1', `aud_reach` = '$pro_rch', `tot_click` = '$pro_clk', `tot_con` = '$pro_con' WHERE `ad_promotion`.`post_id` = '$p_id'");
                                if ($update_pro) {
                                    // oya o
                                    $update_trans = mysqli_query($connection, "INSERT INTO `ad_transaction` (`transaction_id`, `client_id`, `transaction_type`, `amount`, `credit`, `debit`, `created_date`, `user_id`, `ip_address`, `int_id`, `post_id`) VALUES ('{$trans}', '{$client_id}', 'man debit', '{$each_man_earn}', '0.00', '{$each_man_earn}', '{$gen_date1}', '{$man_id}', '{$ip}', '{$int_id}', '{$post_link}')");
                                    // thinking
                                } else {
                                    echo "A PROBLEM";
                                }
                            } else {
                                echo "A SYSTEM PROBLEM";
                            }
                        } else {
                            echo "A SYSTEM PROBLEM";
                        }
                    } else {
                        $pro_rch = $aud_rch + 1;
                        $pro_clk = $aud_clk + 1;
                        $pro_con = $aud_con + 1;
                        $update_pro = mysqli_query($connection, "UPDATE `ad_promotion` SET `aud_reach` = '$pro_rch', `tot_click` = '$pro_clk', `tot_con` = '$pro_con' WHERE `ad_promotion`.`post_id` = '$p_id'");
                        if ($update_pro) {
                            $URL=$fire_link;
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                        } else {
                            echo "err update";
                        }
                    }
                    // MAKE SURE YOU ROLL
                    $URL=$fire_link;
                    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                    // MAKE THE AD ROW
                } else {
                    // done
                    $pro_rch = $aud_rch + 1;
                        $pro_clk = $aud_clk + 1;
                        $pro_con = $aud_con + 1;
                        $update_pro = mysqli_query($connection, "UPDATE `ad_promotion` SET `aud_reach` = '$pro_rch', `tot_click` = '$pro_clk', `tot_con` = '$pro_con', shared = '$pro_clk' WHERE `ad_promotion`.`post_id` = '$p_id'");
                        if ($update_pro) {
                            $URL=$fire_link;
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                        } else {
                            echo "err update";
                        }
                }
            // remember to add to transaction with IP address
            } else {
                // echo Ad has been suspended
                echo "AD HAS BEEN SUSPENDED OR AWAITING APPROVAL";
                $URL="https://thisistera.com";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            }
         } else {
            //  make a normal earning
            $post_query = mysqli_query($connection, "SELECT * FROM `client_post` WHERE post_link = '$post_link'");
            $pq = mysqli_fetch_array($post_query);
            $p_id = $pq["id"];
            $client_id = $pq["client_id"];
            $fire_link = $pq["fire_link"];
            $ap_status = $pq["approval_status"];
            $ad_end_date = $pq["end_date"];
            $days = $pq["days"];
            // promo
            $promotion_query = mysqli_query($connection, "SELECT * FROM `ad_promotion` WHERE post_id = '$p_id'");
            $ppq = mysqli_fetch_array($promotion_query);
            $est_rch = $ppq["est_reach"];
            $est_clk = $ppq["est_click"];
            $est_con = $ppq["est_con"];
            $aud_rch = $ppq["aud_reach"];
            $aud_clk = $ppq["tot_click"];
            $aud_con = $ppq["tot_con"];
            $budget_amt = $ppq["budget_amount"];
            $used_amt = $ppq["used_amount"];
            $pay_stat = $ppq["payment_status"];
            // echo add_up($connection, $aud_clk, $aud_con, $aud_rch);
            $pro_rch = $aud_rch + 1;
            $pro_clk = $aud_clk + 1;
            $pro_con = $aud_con + 1;
            $update_pro = mysqli_query($connection, "UPDATE `ad_promotion` SET `aud_reach` = '$pro_rch', `tot_click` = '$pro_clk', `tot_con` = '$pro_con' WHERE `ad_promotion`.`post_id` = '$p_id'");
            if ($update_pro) {
                $URL=$fire_link;
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            } else {
                echo "err update";
            }
         }
        // making a new move
    } else {
        // echo function to next
        $post_query = mysqli_query($connection, "SELECT * FROM `client_post` WHERE post_link = '$post_link'");
            $pq = mysqli_fetch_array($post_query);
            $p_id = $pq["id"];
            $client_id = $pq["client_id"];
            $fire_link = $pq["fire_link"];
            $ap_status = $pq["approval_status"];
            $ad_end_date = $pq["end_date"];
            $days = $pq["days"];
            // promo
            $promotion_query = mysqli_query($connection, "SELECT * FROM `ad_promotion` WHERE post_id = '$p_id'");
            $ppq = mysqli_fetch_array($promotion_query);
            $est_rch = $ppq["est_reach"];
            $est_clk = $ppq["est_click"];
            $est_con = $ppq["est_con"];
            $aud_rch = $ppq["aud_reach"];
            $aud_clk = $ppq["tot_click"];
            $aud_con = $ppq["tot_con"];
            $budget_amt = $ppq["budget_amount"];
            $used_amt = $ppq["used_amount"];
            $pay_stat = $ppq["payment_status"];
            // echo add_up($connection, $aud_clk, $aud_con, $aud_rch);
            $pro_rch = $aud_rch + 1;
            $pro_clk = $aud_clk + 1;
            $pro_con = $aud_con + 1;
            $update_pro = mysqli_query($connection, "UPDATE `ad_promotion` SET `aud_reach` = '$pro_rch', `tot_click` = '$pro_clk', `tot_con` = '$pro_con' WHERE `ad_promotion`.`post_id` = '$p_id'");
            if ($update_pro) {
                $URL=$fire_link;
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
            } else {
                echo "err update";
            }
    }
} else {
    echo "NO POST";
}
} else {
    // make a new stuff
    echo "NOTHING OVER HERE";
    // add up for normal earning
}
?>
<!-- write a code for every sec a user see's the post it should add plus1 -->
<!-- we are good to go -->