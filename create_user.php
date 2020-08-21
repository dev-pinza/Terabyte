<?php
include("function/db/connect.php");
session_start();
$ut_m = $_SESSION["usertype"];
// Include config file
$digits = 10;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
if ($ut_m == "super" || $ut_m == "man" || $ut_m == "" || $ut_m == NULL) {
require_once "bat/phpmailer/PHPMailerAutoload.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // import DB
$un = preg_replace('/[^\w]/', '', $_POST["un"]);
$fn = preg_replace('/[^\w]/', '', $_POST["fn"]);
$em = $_POST["em"];
$gn = $_POST["gn"];
$dob = $_POST["dob"];
$matric = "0";
$ut = $_POST["ut"];
if ($ut == "super" && $ut_m != "super") {
    $ut = "man";
}
if ($ut == "rep") {
    $matric = $_POST["matric"];
} else {
    $matric = "0";
}
if ($ut_m == "") {
    $ut = "rep";
}
$int_id = $_POST["int_id"];
$u_country = $_POST["u_country"];
$pass = "Terapass2020";
$hash = password_hash($pass, PASSWORD_DEFAULT);
// check the picture forum
$temp1 = explode(".", $_FILES['chooseFile']['name']);
 $digits = 10;
 $randms1 = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
 $sig_passport_one = $randms1. '.' .end($temp1);
 if (move_uploaded_file($_FILES['chooseFile']['tmp_name'], "client_img/" . $sig_passport_one)) {
   $msg = "Image uploaded successfully";
 } else {
   $msg = "Image Failed";
 }
 $mex = substr($sig_passport_one, -3);
 if ($mex != "png" && $mex != "jpg" && $mex != "peg") {
     $sig_passport_one = "av.jpg";
 }
// end picture forum
$ph = $_POST["ph"];
// test if the rest is here
if ($ut == "man") {
    $int_id = $_POST["int_id"];
    $key_man = $_POST["check_me"];
} else if ($ut == "super") {
    $int_id = 0;
}
// do your thing
$date_time = date('Y-m-d H:i:s');

$res = mysqli_query($connection, "SELECT * FROM `users`");
// check if it ex
if (count([$res]) == 1) {
    $x = mysqli_fetch_array($res);
    $ui = $x['username'];
    $ei = $x['email'];
// proper
if ($un !== $ui && $em !== $ei) {
    // add up
    $insert = mysqli_query($connection, "INSERT INTO `users` (`username`, `email`, `fullname`, `password`, `phone`, `usertype`, `created_date`, `gender`, `dob`, `account_id`, `img`, `country`, `int_id`, `matric`) VALUES ('{$un}', '{$em}', '{$fn}', '{$hash}', '{$ph}', '{$ut}', '{$date_time}', '{$gn}', '{$dob}', '0', '{$sig_passport_one}', '{$u_country}', '{$int_id}', '{$matric}')");
        if ($insert) {
             // select user
             $select_user = mysqli_query($connection, "SELECT * FROM `users` WHERE username = '$un' AND email = '$em'");
             $pip = mysqli_fetch_array($select_user);
             $user_id = $pip["id"];
         $insert_account = mysqli_query($connection, "INSERT INTO `account` (`user_id`, `total_dep`, `total_with`, `balance_derived`, `date_created`) VALUES ('{$user_id}', '0.00', '0.00', '0.00', '{$date_time}')");
             // create an account 
             if ($insert_account) {
                //  alright
                if ($ut == "man") {
                    if ($key_man != "" || $key_man != "0"){
                    $update_uni = mysqli_query($connection, "UPDATE `institution` SET key_manager = '$user_id' WHERE id = '$int_id'");
                    }
                }
                // echo msg email
                $gen_date = date('Y-m-d');
             // begining of mail
             $mail = new PHPMailer;
             // from email addreess and name
             $mail->From = "info@thisistera.com";
             $mail->FromName = "Terabyte";
             // to adress and name
             $mail->addAddress($em, $un);
             // reply address
             //Address to which recipient will reply
             // progressive html images
             $mail->addReplyTo("contactus@thisistera.com", "Reply");
             // CC and BCC
             //CC and BCC
             // $mail->addCC("cc@example.com");
             // $mail->addBCC("bcc@example.com");
             // Send HTML or Plain Text Email
             $mail->isHTML(true);
             $mail->Subject = "Welcome to Terabyte";
             $mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
             <html dir='ltr' xmlns='http://www.w3.org/1999/xhtml'>
             
             <head>
                 <meta name='viewport' content='width=device-width' />
                 <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                 <title>Application Successful</title>
             </head>
             
             <body style='margin:0px; background: #f8f8f8; '>
                 <div width='100%' style='background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;'>
                     <div style='max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px'>
                         <table border='0' cellpadding='0' cellspacing='0' style='width: 100%; margin-bottom: 20px'>
                             <tbody>
                                 <tr>
                                     <td style='vertical-align: top; padding-bottom:30px;' align='center'>
                                    Terabyte
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                         <table border='0' cellpadding='0' cellspacing='0' style='width: 100%;'>
                             <tbody>
                                 <tr>
                                     <td style='background:#413e39; padding:20px; color:#fff; text-align:center;'> $ut Registration Successful. </td>
                                 </tr>
                             </tbody>
                         </table>
                         <div style='padding: 40px; background: #fff;'>
                             <table border='0' cellpadding='0' cellspacing='0' style='width: 100%;'>
                                 <tbody>
                                     <tr>
                                         <td>
                                             <p>Submitted Date <b>$gen_date</b></p>
                                             <p>WELCOME TO TERABYTE</p>
                                             <p>Find Below Your Login Credentials Below</p>
                                             <p>Username: $un</p>
                                             <p>Password: $pass</p>
                                             <center>
                                                 <a href='https://thisistera.com/index.php' style='display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #008080; border-radius: 60px; text-decoration:none;'>Login</a>
                                             </center>
                                             <center>
                                                 <a href='https://thisistera.com/change_pass.php' style='display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #008080; border-radius: 60px; text-decoration:none;'>Change Password</a>
                                             </center>
                                             <b>- Thanks (Terabyte Email Robot)</b> </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                         <div style='text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px'>
                             <p> Powered by Terabyte
                                 <br>
                                 <a href='javascript: void(0);' style='color: #b2b2b5; text-decoration: underline;'>Unsubscribe</a> </p>
                         </div>
                     </div>
                 </div>
             </body>
             
             </html>";
             $mail->AltBody = "This is the plain text version of the email content";
             // mail system
             if(!$mail->send()) 
             {
                //  echo email bad
                if ($ut_m != "") {
                $_SESSION["Lack_of_intfund_$randms"] = "Creation Successful";
        echo header ("Location: ams/user_management.php?message1011=$randms");
             } else {
                //  reg successful
                echo header ("Location: rep_return.php");
             }
             } else {
                //  echo email good
                if ($ut_m != "") {
                $_SESSION["Lack_of_intfund_$randms"] = "Creation Successful";
        echo header ("Location: ../ams/user_management.php?message101=$randms");
                } else {
                    // echo registration successful
                    echo header ("Location: rep_return.php");
                }
             }
             } else {
                //  echo users bad
                if ($ut_m != "") {
                $_SESSION["Lack_of_intfund_$randms"] = "User Creation Bad";
        echo header ("Location: ../ams/user_management.php?message102=$randms");
                } else {
                    echo header ("Location: rep_return.php?BAD102CREATIONFAILED");
                }
             }
        } else {
            // echo users account bad
            if ($ut_m != "") {
            $_SESSION["Lack_of_intfund_$randms"] = "User Account Creation Failed";
        echo header ("Location: ../ams/user_management.php?message103=$randms");
            } else {
                echo header ("Location: rep_return.php?BAD103ACCOUNTFAILED");
            }
        }
} else {
    // echo User Exist
    if ($ut_m != ""){ 
    $_SESSION["Lack_of_intfund_$randms"] = "User Exist";
        echo header ("Location: ../ams/user_management.php?message104=$randms");
    } else {
        echo header ("Location: rep_return.php?ACCOUNTEXIST405");
    }
}
}
}
}
?>