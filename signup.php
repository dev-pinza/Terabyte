<?php 
$type = "Signup";
include("header.php");
?>
<?php
include("function/db/connect.php");
// Include config file
require_once "bat/phpmailer/PHPMailerAutoload.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // import DB
$un = $_POST["un"];
$fn = $_POST["fn"];
$em = $_POST["em"];
$ph = $_POST["ph"];
$gn = $_POST["gn"];
$pass = $_POST["pass"];
$hash = password_hash($pass, PASSWORD_DEFAULT);
$ut = "client";
$date_time = date('Y-m-d H:i:s');

$res = mysqli_query($connection, "SELECT * FROM `users`");
// check if it ex
if (count([$res]) == 1) {
    $x = mysqli_fetch_array($res);
    $ui = $x['username'];
    $ei = $x['email'];
// proper
 // img upload
 $temp1 = explode(".", $_FILES['chooseFile']['name']);
 $digits = 10;
 $randms1 = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
 $sig_passport_one = $randms1. '.' .end($temp1);
 if (move_uploaded_file($_FILES['chooseFile']['tmp_name'], "client_img/" . $sig_passport_one)) {
   $msg = "Image uploaded successfully";
 } else {
   $msg = "Image Failed";
 }
//  wow
    if ($un !== $ui && $em !== $ei) {
        // add up
        $insert = mysqli_query($connection, "INSERT INTO `users` (`username`, `email`, `password`, `phone`, `usertype`, `created_date`, `gender`, `account_id`, `img`) VALUES ('{$un}', '{$em}', '{$hash}', '{$ph}', 'client', '{$date_time}', '{$gn}', '0', '{$sig_passport_one}')");
        if ($insert) {
            // select user
            $select_user = mysqli_query($connection, "SELECT * FROM `users` WHERE username = '$un' AND email = '$em'");
            $pip = mysqli_fetch_array($select_user);
            $user_id = $pip["id"];
        $insert_account = mysqli_query($connection, "INSERT INTO `account` (`user_id`, `total_dep`, `total_with`, `balance_derived`, `date_created`) VALUES ('{$user_id}', '0.00', '0.00', '0.00', '{$date_time}')");
            // create an account 
            if ($insert_account) {
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
             $mail->Subject = "WELCOME TO Terabyte";
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
                                     <td style='background:#413e39; padding:20px; color:#fff; text-align:center;'> Admin Registration Successful. </td>
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
                                             <p>Find Below Your Login Credentials</p>
                                             <p>Username: $un</p>
                                             <p>Password: $pass</p>
                                             <center>
                                                 <a href='https://thisistera.com/index.php' style='display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;'>Login</a>
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
                 echo "Mailer Error: " . $mail->ErrorInfo;
                 echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "success",
            title: "Account Created",
            text: "Thank you!",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
                 echo header ("Location: index.php");
             } else
             {
                 echo "Message has been sent successfully";
                 echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "success",
            title: "Account Created",
            text: "Thank you!",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
                 echo header ("Location: index.php");
             }
                // end email
            } else {
                // client account not created
                echo '
                 <script>
                     Swal.fire({
                title: "User Account Failed",
                animation: true,
                customClass: {
                    popup: "animated tada"
                }
            })
                 </script>
                 ';
            }
        } else {
            // echo account user not created
            echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "error",
            title: "Account Error",
            text: "User Creation Failed",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
        }
    } else {
        echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "error",
            title: "Registration Error",
            text: "You Have an Error",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
                 echo "Reg Error";
        // $_SESSION["Lack_of_intfund_$randms"] = "Registration Ex";
        // echo header ("Location: index.php?message3=$randms");
        // Echo Name Exist
    }
}

// insert into client account
// done
}
?>
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(page_img/login.jpg) no-repeat center center;">
            <div class="auth-box">
                <div>
                    <div class="logo">
                        <!-- <span class="db"><img src="../../assets/images/logos/logo-icon.png" alt="logo" /></span> -->
                        <h5 class="font-medium mb-3">Sign Up to Terabyte</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3" method="POST" enctype="multipart/form-data">
                            <div class="form-group row ">
                                    <div class="col-12 ">
                                    <label class="control-label">Username</label>
                                        <input class="form-control form-control-lg" type="text" name="un" required=" " placeholder="Enter your Username">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                    <label class="control-label">Fullname</label>
                                        <input class="form-control form-control-lg" type="text" name="fn" required=" " placeholder="Enter your Fullname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                    <label class="control-label">E-mail</label>
                                        <input class="form-control form-control-lg" type="text" name="em" required=" " placeholder="Enter your E-mail">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                    <label class="control-label">Phone</label>
                                        <input class="form-control form-control-lg" type="t" name="ph" required=" " placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                <div class="col-12">
                                                <div class="form-group has-dark">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control custom-select" name="gn">
                                                        <option value="">Male</option>
                                                        <option value="">Female</option>
                                                    </select>
                                                    <!-- <small class="form-control-feedback"> Select your Gender </small> -->
                                                </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                    <div class="custom-file mb-3">
                              <input type="file" name="chooseFile" class="custom-file-input" id="customFile">
                              <label class="custom-file-label form-control" for="customFile">Choose Image</label>
                            </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                    <label class="control-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="pass" required=" " placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" type="password" required=" " placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 ">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                            <label class="custom-control-label" for="customCheck1">I agree to all <a href="privacy.php" target="_blank">Terms</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 pb-3 ">
                                        <button class="btn btn-block btn-lg btn-dark" type="submit">SIGN UP</button>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-2 ">
                                    <div class="col-sm-12 text-center ">
                                        Already have an account? <a href="index.php" class="text-info ml-1 "><b>Sign In</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
include("footer.php");
?>