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
    if ($username !== $ui && $email !== $ei) {
        // add up
        $insert = mysqli_query($connection, "INSERT INTO `users` (`username`, `email`, `password`, `phone`, `usertype`, `created_date`, `gender`, `account_id`, `img`) VALUES ('{$un}', '{$em}', '{$hash}', '{$ph}', '{client}', '{$date_time}', '{$gn}', '0', '{$sig_passport_one}')");
        if ($insert) {
            // select user
            $select_user = mysqli_query($connection, "SELECT * FROM `users` WHERE username = '$un' AND email = '$em'");
            $pip = mysqli_fetch_array($select_user);
            $user_id = $pip["id"];
        $insert_account = mysqli_query($connection, "INSERT INTO `account` (`user_id`, `total_dep`, `total_with`, `balance_derived`, `date_created`) VALUES ('{$user_id}', '0.00', '0.00', '0.00', '{$date_time}')");
            // create an account 
            if ($insert_account) {
                // echo msg email
            } else {
                // client account not created
            }
        } else {
            // echo account user not created
        }
    } else {
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
                                        <button class="btn btn-block btn-lg btn-dark" type="submit ">SIGN UP</button>
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