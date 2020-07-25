<?php
include("../function/db/connect.php");
// a db connection
if (isset($_GET["no"]) && isset($_GET["harsh"])) {
    // give it a link push
    $post_link = $_GET["no"];
    $rep_id = $_GET["harsh"];
    // select * from users check a usertype
    $sel_rep = mysqli_query($connection, "SELECT * FROM `users` WHERE id='$rep_id'");
    $o = mysqli_fetch_array($sel_rep);
    $is_dis = $o["is_disabled"];
    $int_id = $o["int_id"];
    $user_type = $o["usertype"];
    $fullname = $o["fullname"];
    // if the user has been disabled
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
          $getip = mysqli_query($connection, "SELECT * FROM `ad_transaction` WHERE ip_address = '$ip'");
        // select user account
        if (mysqli_num_rows($getip) <= 0) {
            // done making a move
         } else {
            //  make a new moove
         }
        // making a new move
    } else {
        // echo function to next
    }
} else {
    // make a new stuff
    // add up for normal earning
}
?>
<!-- write a code for every sec a user see's the post it should add plus1 -->
<!-- we are good to go -->