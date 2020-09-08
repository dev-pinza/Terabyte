<?php
$web_title = "Profile Settings";
require_once "../bat/phpmailer/PHPMailerAutoload.php";
include("header.php");
?>
<!-- stating it here -->
<div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="mt-4"> <img src="../client_img/<?php echo $user_img; ?>" class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2"><?php echo $username; ?></h4>
                                    <!-- <h6 class="card-subtitle"></h6> -->
                                    <!-- <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-share"></i> <font class="font-medium">54</font></a></div>
                                    </div> -->
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo $email; ?></h6> <small class="text-muted pt-4 db">Phone</small>
                                <h6><?php echo $user_phone; ?></h6> <small class="text-muted pt-4 db">Location</small>
                                <h6><?php echo $user_location ?></h6>
                                <small class="text-muted pt-4 db">Social Profile</small>
                                <br/>
                                <!-- <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button> -->
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <!-- <li class="nav-item">
                                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                                </li>
                            </ul>
                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">
                                <!-- <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                    <div class="card-body">
                                        <div class="steamline mt-0">
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">Sam</a> <span class="sl-date">5 minutes ago</span>
                                                        <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 mb-3"><img src="../../assets/images/big/img1.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 mb-3"><img src="../../assets/images/big/img2.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 mb-3"><img src="../../assets/images/big/img3.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 mb-3"><img src="../../assets/images/big/img4.jpg" class="img-fluid rounded" /></div>
                                                        </div>
                                                        <div class="desc"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <div class="mt-3 row">
                                                            <div class="col-md-3 col-xs-12"><img src="../../assets/images/big/img1.jpg" alt="user" class="img-fluid rounded" /></div>
                                                            <div class="col-md-9 col-xs-12">
                                                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a></div>
                                                        </div>
                                                        <div class="desc mt-3"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p class="mt-2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                    </div>
                                                    <div class="desc mt-3"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/4.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <blockquote class="mt-2">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $fullname; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $user_phone; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $email; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $user_location; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="mt-4">Quote</p>
                                        <p>Motivation for the day "JUST KEEP DOING WHAT YOU DO" </p>
                                        <h4 class="font-medium mt-4">Interest Set</h4>
                                        <hr>
                                        <?php 
                                         $don = "SELECT * FROM `interest` WHERE user_id = '$user_id' ORDER BY id DESC";
                                         $result = mysqli_query($connection, $don);
                                         if (mysqli_num_rows($result) >= 1) {
                                         while ($pox = mysqli_fetch_array($result)) {
                                             $int_no = $pox["interest_id"];
                                             if ($int_no == 1) {
                                                 $int_name = "Finance & Investment";
                                             } else if ($int_no == 2) {
                                                $int_name = "Transportation";
                                             } else if ($int_no == 3) {
                                                $int_name = "Software/Computer & Eletronic Gadget";
                                             } else if ($int_no == 4) {
                                                $int_name = "E-commerce";
                                             } else if ($int_no == 5) {
                                                $int_name = "Education";
                                             } else if ($int_no == 6) {
                                                $int_name = "Health/Skin Care & Pharmacecutical";
                                             } else if ($int_no == 7) {
                                                $int_name = "Food & Agriculture";
                                             } else if ($int_no == 8) {
                                                $int_name = "Entertainment & Music";
                                             } else if ($int_no == 9) {
                                                $int_name = "News & Media";
                                             } else if ($int_no == 10) {
                                                $int_name = "Manufacturing";
                                             } else if ($int_no == 11) {
                                                $int_name = "Energy and Power";
                                             } else if ($int_no == 12) {
                                                $int_name = "Mining";
                                             }
                                        ?>
                                        <h5 class="mt-4"><?php echo $int_name ?> <span class="pull-right"><?php $pox["date"]; ?></span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%; height:6px;"> <span class="sr-only"></span> </div>
                                        </div>
                                        <?php 
                                         }
                                        } else {
                                            echo "ALL INTEREST ADDED AS DEFUALT";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- EM -->
                                <?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $old = $_POST["oldpasskey"];
   $new = password_hash($_POST["newpasskey"], PASSWORD_DEFAULT);
   $email = $_SESSION["email"];
  //  select the db
  $username = $_SESSION["username"];
  // check
  $query_pass = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");
  if (mysqli_num_rows($query_pass) >= 1) {
    $x = mysqli_fetch_array($query_pass);
    $id_user = $x["id"];
    $user_pass = $x["password"];
    // making a change
    if (password_verify($old, $user_pass)) {
      // new password
      $update_query = mysqli_query($connection, "UPDATE `users` SET `password` = '$new' WHERE `users`.`id` = '$id_user'");
      if ($update_query) {
        echo '<script type="text/javascript">
                    $(document).ready(function(){
                        Swal.fire({
                            type: "success",
                            title: "Password Changed Successfully",
                            text: "This will be affected upon your next login",
                            showConfirmButton: false,
                            timer: 5000
                        })
                    });
                    </script>
        ';
      } else {
        echo '<script type="text/javascript">
        $(document).ready(function(){
            Swal.fire({
                type: "error",
                title: "Entry Error",
                text: "Please Check Your Password Character",
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
                            title: "Old Password is Wrong",
                            text: "Please Check Your Mail to Reset if You cant remember old password",
                            showConfirmButton: false,
                            timer: 4000
                        })
                    });
                    </script>
        ';
        // check new
        $mail = new PHPMailer;
        // from email addreess and name
        $mail->From = "info@thisistera.com";
        $mail->FromName = "Terabyte";
        // to adress and name
        $mail->addAddress($email, $username);
        // reply address
        //Address to which recipient will reply
        // progressive html images
        $mail->addReplyTo("info@thisistera.com", "Reply");
        // CC and BCC
        //CC and BCC
        // $mail->addCC("cc@example.com");
        // $mail->addBCC("bcc@example.com");
        // Send HTML or Plain Text Email
        $mail->isHTML(true);
        $mail->Subject = "CHANGING PASSWORD?";
        $mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
        
        <head>
            <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
            <meta name='viewport' content='width=device-width'>
            <!--[if !mso]><!-->
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <!--<![endif]-->
            <title></title>
            <!--[if !mso]><!-->
            <!--<![endif]-->
            <style type='text/css'>
                body {
                    margin: 0;
                    padding: 0;
                }
        
                table,
                td,
                tr {
                    vertical-align: top;
                    border-collapse: collapse;
                }
        
                * {
                    line-height: inherit;
                }
        
                a[x-apple-data-detectors=true] {
                    color: inherit !important;
                    text-decoration: none !important;
                }
            </style>
            <style type='text/css' id='media-query'>
                @media (max-width: 520px) {
        
                    .block-grid,
                    .col {
                        min-width: 320px !important;
                        max-width: 100% !important;
                        display: block !important;
                    }
        
                    .block-grid {
                        width: 100% !important;
                    }
        
                    .col {
                        width: 100% !important;
                    }
        
                    .col>div {
                        margin: 0 auto;
                    }
        
                    img.fullwidth,
                    img.fullwidthOnMobile {
                        max-width: 100% !important;
                    }
        
                    .no-stack .col {
                        min-width: 0 !important;
                        display: table-cell !important;
                    }
        
                    .no-stack.two-up .col {
                        width: 50% !important;
                    }
        
                    .no-stack .col.num4 {
                        width: 33% !important;
                    }
        
                    .no-stack .col.num8 {
                        width: 66% !important;
                    }
        
                    .no-stack .col.num4 {
                        width: 33% !important;
                    }
        
                    .no-stack .col.num3 {
                        width: 25% !important;
                    }
        
                    .no-stack .col.num6 {
                        width: 50% !important;
                    }
        
                    .no-stack .col.num9 {
                        width: 75% !important;
                    }
        
                    .video-block {
                        max-width: none !important;
                    }
        
                    .mobile_hide {
                        min-height: 0px;
                        max-height: 0px;
                        max-width: 0px;
                        display: none;
                        overflow: hidden;
                        font-size: 0px;
                    }
        
                    .desktop_hide {
                        display: block !important;
                        max-height: none !important;
                    }
                }
            </style>
        </head>
        
        <body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;'>
            <!--[if IE]><div class='ie-browser'><![endif]-->
            <table class='nl-container' style='table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;' cellpadding='0' cellspacing='0' role='presentation' width='100%' bgcolor='#FFFFFF' valign='top'>
                <tbody>
                    <tr style='vertical-align: top;' valign='top'>
                        <td style='word-break: break-word; vertical-align: top;' valign='top'>
                            <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:#FFFFFF'><![endif]-->
                            <div style='background-color:transparent;'>
                                <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;'>
                                    <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                                        <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                                        <!--[if (mso)|(IE)]><td align='center' width='500' style='background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                                        <div class='col num12' style='min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;'>
                                            <div style='width:100% !important;'>
                                                <!--[if (!mso)&(!IE)]><!-->
                                                <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                                                    <!--<![endif]-->
                                                    <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                                                    <div style='color:#e7953f;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                        <div style='line-height: 2; font-size: 12px; color: #e7953f; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 24px;'>
                                                            <p style='font-size: 14px; line-height: 2; word-break: break-word; mso-line-height-alt: 28px; margin: 0;'><strong>Did You Just Logged In?</strong></p>
                                                        </div>
                                                    </div>
                                                    <!--[if mso]></td></tr></table><![endif]-->
                                                    <table class='divider' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' role='presentation' valign='top'>
                                                        <tbody>
                                                            <tr style='vertical-align: top;' valign='top'>
                                                                <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                                                                    <table class='divider_content' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #C39F3C; height: 1px; width: 100%;' align='center' role='presentation' height='1' valign='top'>
                                                                        <tbody>
                                                                            <tr style='vertical-align: top;' valign='top'>
                                                                                <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' height='1' valign='top'><span></span></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class='img-container center fixedwidth' align='center' style='padding-right: 0px;padding-left: 0px;'>
                                                        <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img class='center fixedwidth' align='center' border='0' src='https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/536737_517710/57e3d3404a53ad14f1dc8460962a3f7f153fdde74e50744172297fdc9448c6_640.png' alt='Alternate text' title='Alternate text' style='text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 150px; display: block;' width='150'>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </div>
                                                    <div class='button-container' align='center' style='padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                        <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'><tr><td style='padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px' align='center'><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='#' style='height:31.5pt; width:150.75pt; v-text-anchor:middle;' arcsize='10%' stroke='false' fillcolor='#c39f3c'><w:anchorlock/><v:textbox inset='0,0,0,0'><center style='color:#ffffff; font-family:Arial, sans-serif; font-size:16px'><![endif]-->
                                                            <a href='#' target='_blank' style='-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #c39f3c; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width: auto; width: auto; border-top: 1px solid #c39f3c; border-right: 1px solid #c39f3c; border-bottom: 1px solid #c39f3c; border-left: 1px solid #c39f3c; padding-top: 5px; padding-bottom: 5px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;'><span style='padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;'><span style='font-size: 16px; line-height: 2; word-break: break-word; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 32px;'>update password</span></span></a>
                                                        <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--[if (IE)]></div><![endif]-->
        </body>
        
        </html>
        ";
        $mail->AltBody = "This is the plain text version of the email content";
        // mail system
        if(!$mail->send()) 
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else
        {
            echo "Message has been sent successfully";
        }
    }
  }
 }
?>
                                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" method="POST">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="full" value="<?php echo $fullname ?>" class="form-control form-control-line" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" name="em" placeholder="<?php echo $email ?>" class="form-control form-control-line" name="example-email" id="example-email" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="phone" readonly value="<?php echo $user_phone; ?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Old Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="" name="oldpasskey" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">New Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="" name="newpasskey" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div id="in_rec"></div>
                                            <div class="form-group">
                                            <input type="text" name="chk" value="<?php echo $user_id; ?>" id ="user_id" hidden>
                                            <script>
$(document).ready(function () {
    $('#add_in').on("change", function (e) {
               var u_id = $('#user_id').val();
               var int_id = $('#add_in').val();
                if (int_id != "all") {
                    $.ajax({
                 url: "ajax_post/add_in.php",
                 method: "POST",
                 data:{u_id:u_id, int_id:int_id},
                 success: function (data) {
                   $('#in_rec').html(data);
                 }
               });
               e.stopImmediatePropagation();
    e.preventDefault();
                }
             });
});
</script>
                                                <label class="col-sm-12">Select Interest (Default all)</label>
                                                <div class="col-sm-12">
                                                    <select id="add_in" name="subm" class="form-control form-control-line">
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
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success">Change Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
<!-- ending it here -->
<?php
include("footer.php");
?>