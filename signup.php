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
$country = $_POST["country"];
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
 $mex = substr($sig_passport_one, -3);
 if ($mex != "png" && $mex != "jpg" && $mex != "peg") {
     $sig_passport_one = "av.jpg";
 }
//  wow
    if ($un !== $ui && $em !== $ei) {
        // add up
        $insert = mysqli_query($connection, "INSERT INTO `users` (`username`, `email`, `fullname`, `password`, `phone`, `usertype`, `created_date`, `gender`, `account_id`, `img`, `country`) VALUES ('{$un}', '{$em}', '{$fn}', '{$hash}', '{$ph}', 'client', '{$date_time}', '{$gn}', '0', '{$sig_passport_one}', '{$country}')");
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
                                     <td style='background:#413e39; padding:20px; color:#fff; text-align:center;'> Terabyte Registration Successful. </td>
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
        Swal.fire({
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
        Swal.fire({
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
                     Swal.fire.fire({
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
        Swal.fire({
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
        Swal.fire({
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
                                        <input class="form-control form-control-lg" type="text" name="fn" required=" " placeholder="Enter your Firstname Lastname">
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
                              <input type="file" name="chooseFile" class="custom-file-input" id="customFile" accept="image/*">
                              <label class="custom-file-label form-control" for="customFile">Choose Image</label>
                            </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-12">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control custom-select" name="country">
                                                        <option value="Nigeria">Nigeria</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                <option value="Ã…land Islands">Ã…land Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <!-- <option value="Nigeria">Nigeria</option> -->
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
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
                                        Already have an account? <a href="login.php" class="text-info ml-1 "><b>Sign In</b></a>
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