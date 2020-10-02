<?php
// include connection
include("../function/db/connect.php");
// now get the email.
require_once "../bat/phpmailer/PHPMailerAutoload.php";

// NOW QUERY YOUR START
$current_date = date('Y-m-d');
$date_time = date('Y-m-d H:i:s');
// get the ads with same end date.
$query_end_post = mysqli_query($connection, "SELECT * FROM `client_post` WHERE (end_date < '$current_date' OR end_date = '$current_date') AND approval_status = '1'");
// AUTO RENEWAL, REACH - NOTE ALL
if (mysqli_num_rows($query_end_post) > 0) {
    // while loop
    while ($x = mysqli_fetch_array($query_end_post)) {
        $post_id = $x["id"];
        $client_id = $x["client_id"];
        $post_link = $x["post_link"];
        $auto_renew = $x["auto_renew"];
        $approval_status = $x["approval_status"];
        // query the promotion
        $query_promotion = mysqli_query($connection, "SELECT * FROM `ad_promotion` WHERE post_id = '$post_id'");
        $m = mysqli_fetch_array($query_promotion);
        if (mysqli_num_rows($query_promotion)) {
        $pro_id = $m["id"];
        $est_rch = $m["est_reach"];
        $aud_reach = $m["aud_reach"];
        // budget vs used
        $digits = 10;
        $randms1 = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        // end
        $budget_amount = $m["budget_amount"];
        $used_amount = $m["used_amount"];
        $pay_stat = $m["payment_status"];
        $return_amount = 0;
        // CALCULATE THE BALANCE OF THE PAYMENT
        // GET CLIENT ACCOUNT_BALANCE
        $query_account = mysqli_query($connection, "SELECT * FROM `account` WHERE `user_id` = '$client_id'");
        $ca = mysqli_fetch_array($query_account);
        $tot_dep = $ca["total_dep"];
        $account_balance = $ca["balance_derived"];
        if ($used_amount >= $budget_amount){
            $query_update_pro = mysqli_query($connection, "UPDATE client_post SET approval_status = '0' WHERE id = '$post_id'");
            if ($query_update_pro) {
                $query_pro = mysqli_query($connection, "UPDATE `ad_promotion` SET payment_status = 'Not Active' WHERE id = '$pro_id'");
                if ($query_pro) {
                    echo "DONE AT FINISH CASH";
                    // START
                    $query_users = mysqli_query($connection, "SELECT * FROM `users` WHERE id = '$client_id'");
                    $po = mysqli_fetch_array($query_users);
                    $email = $po["email"];
                    $fullname = $po["fullname"];
                    // send email
                      // begining of mail
                      $mail = new PHPMailer;
                      // from email addreess and name
                      $mail->From = "info@thisistera.com";
                      $mail->FromName = "Terabyte";
                      // to adress and name
                      $mail->addAddress($email, $fullname);
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
                      $mail->Subject = "$fullname your $post_link - Ad Expired";
                      $mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

                      <html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
                      <head>
                      <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
                      <meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
                      <meta content='width=device-width' name='viewport'/>
                      <!--[if !mso]><!-->
                      <meta content='IE=edge' http-equiv='X-UA-Compatible'/>
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
                      <style id='media-query' type='text/css'>
                              @media (max-width: 660px) {
                      
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
                      <body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #f8f8f9;'>
                      <!--[if IE]><div class='ie-browser'><![endif]-->
                      <table bgcolor='#f8f8f9' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f8f8f9; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top;' valign='top'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:#f8f8f9'><![endif]-->
                      <div style='background-color:#1aa19c;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #1aa19c;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#1aa19c;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#1aa19c;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#1aa19c'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#1aa19c;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:#008080;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #008080;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#008080;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#008080;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#008080'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#008080;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <div align='center' class='img-container center fixedwidth' style='padding-right: 0px;padding-left: 0px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]-->
                      <div style='font-size:1px;line-height:22px'> </div><img align='center' alt='I'm an image' border='0' class='center fixedwidth' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Ftera1.png?alt=media&amp;token=266a0398-7f76-46ba-8297-c487137df252' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 160px; display: block;' title='I'm an image' width='160'/>
                      <div style='font-size:1px;line-height:25px'> </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #f8f8f9;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#f8f8f9;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#f8f8f9'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#f8f8f9;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #fff;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#fff;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#fff'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#fff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 60px; padding-right: 0px; padding-bottom: 12px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <div align='center' class='img-container center fixedwidth' style='padding-right: 40px;padding-left: 40px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 40px;padding-left: 40px;' align='center'><![endif]--><img align='center' alt='I'm an image' border='0' class='center fixedwidth' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2FImg5_2x.jpg?alt=media&token=d712aabd-5f47-471b-b23d-bdd99fd8ca7b' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 352px; display: block;' title='I'm an image' width='352'/>
                      <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 50px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;'>
                      <div style='line-height: 1.2; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;'>
                      <p style='font-size: 30px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 36px; margin: 0;'><span style='font-size: 30px; color: #2b303a;'><strong>Your Ad has reached due date code: $post_link</strong></span></p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;'>
                      <div style='line-height: 1.5; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;'>
                      <p style='font-size: 15px; line-height: 1.5; text-align: center; word-break: break-word; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 23px; margin: 0;'><span style='color: #808389; font-size: 15px;'>Thank you so much for running ad with #Terabyte please you can always renew this ad. Your balance from the spent cash for promotion has been returned back to your wallet thank you!</span></p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 50px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid two-up no-stack' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #fff;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#fff;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#fff'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='320' style='background-color:#fff;width:320px; border-top: 0px solid transparent; border-left: none; border-bottom: 0px solid transparent; border-right: 8px solid #FFF;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-top:0px;padding-bottom:0px' width='20' bgcolor='#FFF'><table role='presentation' width='20' cellpadding='0' cellspacing='0' border='0'><tr><td>&nbsp;</td></tr></table></td><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;background-color:#f3fafa;'><![endif]-->
                      <div class='col num6' style='min-width: 320px; max-width: 320px; display: table-cell; vertical-align: top; background-color: #f3fafa; width: 292px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:20px solid #FFF; border-bottom:0px solid transparent; border-right:8px solid #FFF; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 5px; padding-left: 5px; padding-top: 35px; padding-bottom: 40px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:35px;padding-right:5px;padding-bottom:40px;padding-left:5px;'>
                      <div style='line-height: 1.5; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;'>
                      <p style='font-size: 12px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 18px; margin: 0;'><span style='color: #a2a9ad; font-size: 12px;'><strong>Total Reach</strong></span></p>
                      <p style='font-size: 16px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 24px; margin: 0;'>$aud_reach</p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td><td align='center' width='320' style='background-color:#fff;width:320px; border-top: 0px solid transparent; border-left: 8px solid #FFF; border-bottom: 0px solid transparent; border-right: none;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;background-color:#f3fafa;'><![endif]-->
                      <div class='col num6' style='min-width: 320px; max-width: 320px; display: table-cell; vertical-align: top; background-color: #f3fafa; width: 292px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:8px solid #FFF; border-bottom:0px solid transparent; border-right:20px solid #FFF; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 5px; padding-left: 5px; padding-top: 35px; padding-bottom: 40px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:35px;padding-right:5px;padding-bottom:40px;padding-left:5px;'>
                      <div style='line-height: 1.5; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;'>
                      <p style='font-size: 12px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 18px; margin: 0;'><span style='color: #a2a9ad; font-size: 12px;'><strong>TOTAL SPENT</strong></span></p>
                      <p style='font-size: 16px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 24px; margin: 0;'>NGN $used_amount</p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><td style='padding-top:0px;padding-bottom:0px' width='20' bgcolor='#FFF'><table role='presentation' width='20' cellpadding='0' cellspacing='0' border='0'><tr><td>&nbsp;</td></tr></table></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #fff;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#fff;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#fff'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#fff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <div align='center' class='button-container' style='padding-top:40px;padding-right:10px;padding-bottom:0px;padding-left:10px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'><tr><td style='padding-top: 40px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px' align='center'><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='https://thisistera.com' style='height:46.5pt; width:188.25pt; v-text-anchor:middle;' arcsize='97%' stroke='false' fillcolor='#1aa19c'><w:anchorlock/><v:textbox inset='0,0,0,0'><center style='color:#ffffff; font-family:Tahoma, sans-serif; font-size:16px'><![endif]--><a href='https://thisistera.com' style='-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #1aa19c; border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px; width: auto; width: auto; border-top: 1px solid #1aa19c; border-right: 1px solid #1aa19c; border-bottom: 1px solid #1aa19c; border-left: 1px solid #1aa19c; padding-top: 15px; padding-bottom: 15px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;' target='_blank'><span style='padding-left:30px;padding-right:30px;font-size:16px;display:inline-block;'><span style='font-size: 16px; margin: 0; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;'><strong>Download Invoice</strong></span></span></a>
                      <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                      </div>
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 60px; padding-right: 0px; padding-bottom: 12px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #f8f8f9;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#f8f8f9;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#f8f8f9'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#f8f8f9;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #2b303a;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#2b303a;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#2b303a'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#2b303a;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <div align='center' class='img-container center autowidth' style='padding-right: 0px;padding-left: 0px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img align='center' alt='I'm an image' border='0' class='center autowidth' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Ffooter.png?alt=media&token=80b26fa1-bcac-446f-b5bb-bda1d074c9f6' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 640px; display: block;' title='I'm an image' width='640'/>
                      <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <div align='center' class='img-container center fixedwidth' style='padding-right: 0px;padding-left: 0px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]-->
                      <div style='font-size:1px;line-height:40px'> </div><img align='center' alt='Alternate text' border='0' class='center fixedwidth' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Ftera1.png?alt=media&amp;token=266a0398-7f76-46ba-8297-c487137df252' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 160px; display: block;' title='Alternate text' width='160'/>
                      <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <table cellpadding='0' cellspacing='0' class='social_icons' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; padding-top: 28px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                      <table align='center' cellpadding='0' cellspacing='0' class='social_table' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;' valign='top'>
                      <tbody>
                      <tr align='center' style='vertical-align: top; display: inline-block; text-align: center;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;' valign='top'><a href='https://www.facebook.com/thisistera_' target='_blank'><img alt='Facebook' height='32' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Ffacebook2x.png?alt=media&token=31ac8fd1-1215-4468-bc24-be3f21a7b555' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Facebook' width='32'/></a></td>
                      <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;' valign='top'><a href='https://twitter.com/thisistera_' target='_blank'><img alt='Twitter' height='32' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Ftwitter2x.png?alt=media&token=5879b946-f2be-41fc-b2e3-4cf61259ea46' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Twitter' width='32'/></a></td>
                      <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;' valign='top'><a href='https://instagram.com/thisistera_' target='_blank'><img alt='Instagram' height='32' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Finstagram2x.png?alt=media&token=c234c37c-c67c-4364-85ec-4c610abf68b2' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Instagram' width='32'/></a></td>
                      <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;' valign='top'><a href='https://www.linkedin.com/thisistera_' target='_blank'><img alt='LinkedIn' height='32' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Flinkedin2x.png?alt=media&token=b75749d5-4584-4add-aedb-2c2e620781be' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='LinkedIn' width='32'/></a></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 40px; padding-left: 40px; padding-top: 15px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:15px;padding-right:40px;padding-bottom:10px;padding-left:40px;'>
                      <div style='line-height: 1.5; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;'>
                      <p style='font-size: 12px; line-height: 1.5; word-break: break-word; text-align: center; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px; margin: 0;'><span style='color: #95979c; font-size: 12px;'>Block 19 zone B central market, Obafemi Awolowo University,<br/>Ile-Ife Osun state Nigeria</span></p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 25px; padding-right: 40px; padding-bottom: 10px; padding-left: 40px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #555961; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 40px; padding-left: 40px; padding-top: 20px; padding-bottom: 30px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:20px;padding-right:40px;padding-bottom:30px;padding-left:40px;'>
                      <div style='line-height: 1.8; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 22px;'>
                      <p style='font-size: 12px; line-height: 1.8; word-break: break-word; text-align: center; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 22px; margin: 0;'><span style='color: #95979c; font-size: 12px;'>Terabyte2020 Copyright © 2020</span></p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
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
                      </html>";
                      $mail->AltBody = "This is the plain text version of the email content";
                      // mail system
                      if(!$mail->send()) 
                      {
                          echo "EMAIL NOT SENT";
                      } else {
                          echo "EMAIL SENT";
                      }
                } else {
                    echo "ERROR AT FINISH CASH";
                }
            }
        } else {
            // make the ad return work
            $return_amount = $budget_amount - $used_amount;
            $query_update_pro = mysqli_query($connection, "UPDATE client_post SET approval_status = '0' WHERE id = '$post_id'");
            if ($query_update_pro) {
                $new_balance = $account_balance + $return_amount;
                $new_tot_dep = $tot_dep + $return_amount;
                $query_account =  mysqli_query($connection, "UPDATE `account` SET balance_derived = '$new_balance', total_dep = '$new_tot_dep' WHERE `user_id` = '$client_id'");
                if ($query_account) {
                    echo "AD CASH HAS BEEN RETUNED";
                    $query_ad_transact = mysqli_query($connection, "INSERT INTO `acct_transaction` (`user_id`, `transaction_id`, `transaction_type`, `amount`, `account_balance`, `credit`, `debit`, `transaction_date`) VALUES ('{$client_id}', '{$randms1}', 'Ad Balance Return', '{$return_amount}', '{$new_balance}', '{$return_amount}', '0.00', '{$date_time}')");
                    if ($query_account) {
                        echo "ACCOUNT TRANSACTION SUCCESSFUL";
                        $query_pro = mysqli_query($connection, "UPDATE `ad_promotion` SET payment_status = 'Not Active' WHERE id = '$pro_id'");
                        if ($query_pro) {
                            echo "DONE AT FINISH OUT";
                            $query_users = mysqli_query($connection, "SELECT * FROM `users` WHERE id = '$client_id'");
                    $po = mysqli_fetch_array($query_users);
                    $email = $po["email"];
                    $fullname = $po["fullname"];
                    // send email
                      // begining of mail
                      $mail = new PHPMailer;
                      // from email addreess and name
                      $mail->From = "info@thisistera.com";
                      $mail->FromName = "Terabyte";
                      // to adress and name
                      $mail->addAddress($email, $fullname);
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
                      $mail->Subject = "$fullname your $post_link - Ad Expired";
                      $mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

                      <html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
                      <head>
                      <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
                      <meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
                      <meta content='width=device-width' name='viewport'/>
                      <!--[if !mso]><!-->
                      <meta content='IE=edge' http-equiv='X-UA-Compatible'/>
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
                      <style id='media-query' type='text/css'>
                              @media (max-width: 660px) {
                      
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
                      <body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #f8f8f9;'>
                      <!--[if IE]><div class='ie-browser'><![endif]-->
                      <table bgcolor='#f8f8f9' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f8f8f9; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top;' valign='top'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:#f8f8f9'><![endif]-->
                      <div style='background-color:#1aa19c;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #1aa19c;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#1aa19c;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#1aa19c;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#1aa19c'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#1aa19c;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:#008080;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #008080;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#008080;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#008080;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#008080'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#008080;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <div align='center' class='img-container center fixedwidth' style='padding-right: 0px;padding-left: 0px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]-->
                      <div style='font-size:1px;line-height:22px'> </div><img align='center' alt='I'm an image' border='0' class='center fixedwidth' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Ftera1.png?alt=media&amp;token=266a0398-7f76-46ba-8297-c487137df252' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 160px; display: block;' title='I'm an image' width='160'/>
                      <div style='font-size:1px;line-height:25px'> </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #f8f8f9;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#f8f8f9;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#f8f8f9'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#f8f8f9;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #fff;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#fff;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#fff'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#fff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 60px; padding-right: 0px; padding-bottom: 12px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <div align='center' class='img-container center fixedwidth' style='padding-right: 40px;padding-left: 40px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 40px;padding-left: 40px;' align='center'><![endif]--><img align='center' alt='I'm an image' border='0' class='center fixedwidth' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2FImg5_2x.jpg?alt=media&token=d712aabd-5f47-471b-b23d-bdd99fd8ca7b' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 352px; display: block;' title='I'm an image' width='352'/>
                      <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 50px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;'>
                      <div style='line-height: 1.2; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;'>
                      <p style='font-size: 30px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 36px; margin: 0;'><span style='font-size: 30px; color: #2b303a;'><strong>Your Ad has reached due date code: $post_link</strong></span></p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;'>
                      <div style='line-height: 1.5; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;'>
                      <p style='font-size: 15px; line-height: 1.5; text-align: center; word-break: break-word; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 23px; margin: 0;'><span style='color: #808389; font-size: 15px;'>Thank you so much for running ad with #Terabyte please you can always renew this ad. Your balance from the spent cash for promotion has been returned back to your wallet thank you!</span></p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 50px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid two-up no-stack' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #fff;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#fff;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#fff'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='320' style='background-color:#fff;width:320px; border-top: 0px solid transparent; border-left: none; border-bottom: 0px solid transparent; border-right: 8px solid #FFF;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-top:0px;padding-bottom:0px' width='20' bgcolor='#FFF'><table role='presentation' width='20' cellpadding='0' cellspacing='0' border='0'><tr><td>&nbsp;</td></tr></table></td><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;background-color:#f3fafa;'><![endif]-->
                      <div class='col num6' style='min-width: 320px; max-width: 320px; display: table-cell; vertical-align: top; background-color: #f3fafa; width: 292px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:20px solid #FFF; border-bottom:0px solid transparent; border-right:8px solid #FFF; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 5px; padding-left: 5px; padding-top: 35px; padding-bottom: 40px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:35px;padding-right:5px;padding-bottom:40px;padding-left:5px;'>
                      <div style='line-height: 1.5; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;'>
                      <p style='font-size: 12px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 18px; margin: 0;'><span style='color: #a2a9ad; font-size: 12px;'><strong>Total Reach</strong></span></p>
                      <p style='font-size: 16px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 24px; margin: 0;'>$aud_reach</p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td><td align='center' width='320' style='background-color:#fff;width:320px; border-top: 0px solid transparent; border-left: 8px solid #FFF; border-bottom: 0px solid transparent; border-right: none;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;background-color:#f3fafa;'><![endif]-->
                      <div class='col num6' style='min-width: 320px; max-width: 320px; display: table-cell; vertical-align: top; background-color: #f3fafa; width: 292px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:8px solid #FFF; border-bottom:0px solid transparent; border-right:20px solid #FFF; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 5px; padding-left: 5px; padding-top: 35px; padding-bottom: 40px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:35px;padding-right:5px;padding-bottom:40px;padding-left:5px;'>
                      <div style='line-height: 1.5; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;'>
                      <p style='font-size: 12px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 18px; margin: 0;'><span style='color: #a2a9ad; font-size: 12px;'><strong>TOTAL SPENT</strong></span></p>
                      <p style='font-size: 16px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 24px; margin: 0;'>NGN $used_amount</p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><td style='padding-top:0px;padding-bottom:0px' width='20' bgcolor='#FFF'><table role='presentation' width='20' cellpadding='0' cellspacing='0' border='0'><tr><td>&nbsp;</td></tr></table></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #fff;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#fff;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#fff'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#fff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <div align='center' class='button-container' style='padding-top:40px;padding-right:10px;padding-bottom:0px;padding-left:10px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'><tr><td style='padding-top: 40px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px' align='center'><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='https://thisistera.com' style='height:46.5pt; width:188.25pt; v-text-anchor:middle;' arcsize='97%' stroke='false' fillcolor='#1aa19c'><w:anchorlock/><v:textbox inset='0,0,0,0'><center style='color:#ffffff; font-family:Tahoma, sans-serif; font-size:16px'><![endif]--><a href='https://thisistera.com' style='-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #1aa19c; border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px; width: auto; width: auto; border-top: 1px solid #1aa19c; border-right: 1px solid #1aa19c; border-bottom: 1px solid #1aa19c; border-left: 1px solid #1aa19c; padding-top: 15px; padding-bottom: 15px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;' target='_blank'><span style='padding-left:30px;padding-right:30px;font-size:16px;display:inline-block;'><span style='font-size: 16px; margin: 0; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;'><strong>Download Invoice</strong></span></span></a>
                      <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                      </div>
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 60px; padding-right: 0px; padding-bottom: 12px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #f8f8f9;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#f8f8f9;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#f8f8f9'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#f8f8f9;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                      </div>
                      </div>
                      </div>
                      <div style='background-color:transparent;'>
                      <div class='block-grid' style='Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #2b303a;'>
                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#2b303a;'>
                      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:640px'><tr class='layout-full-width' style='background-color:#2b303a'><![endif]-->
                      <!--[if (mso)|(IE)]><td align='center' width='640' style='background-color:#2b303a;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;'><![endif]-->
                      <div class='col num12' style='min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;'>
                      <div style='width:100% !important;'>
                      <!--[if (!mso)&(!IE)]><!-->
                      <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                      <!--<![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 4px solid #1AA19C; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <div align='center' class='img-container center autowidth' style='padding-right: 0px;padding-left: 0px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img align='center' alt='I'm an image' border='0' class='center autowidth' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Ffooter.png?alt=media&token=80b26fa1-bcac-446f-b5bb-bda1d074c9f6' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 640px; display: block;' title='I'm an image' width='640'/>
                      <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <div align='center' class='img-container center fixedwidth' style='padding-right: 0px;padding-left: 0px;'>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]-->
                      <div style='font-size:1px;line-height:40px'> </div><img align='center' alt='Alternate text' border='0' class='center fixedwidth' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Ftera1.png?alt=media&amp;token=266a0398-7f76-46ba-8297-c487137df252' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 160px; display: block;' title='Alternate text' width='160'/>
                      <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <table cellpadding='0' cellspacing='0' class='social_icons' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; padding-top: 28px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                      <table align='center' cellpadding='0' cellspacing='0' class='social_table' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;' valign='top'>
                      <tbody>
                      <tr align='center' style='vertical-align: top; display: inline-block; text-align: center;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;' valign='top'><a href='https://www.facebook.com/thisistera_' target='_blank'><img alt='Facebook' height='32' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Ffacebook2x.png?alt=media&token=31ac8fd1-1215-4468-bc24-be3f21a7b555' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Facebook' width='32'/></a></td>
                      <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;' valign='top'><a href='https://twitter.com/thisistera_' target='_blank'><img alt='Twitter' height='32' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Ftwitter2x.png?alt=media&token=5879b946-f2be-41fc-b2e3-4cf61259ea46' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Twitter' width='32'/></a></td>
                      <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;' valign='top'><a href='https://instagram.com/thisistera_' target='_blank'><img alt='Instagram' height='32' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Finstagram2x.png?alt=media&token=c234c37c-c67c-4364-85ec-4c610abf68b2' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='Instagram' width='32'/></a></td>
                      <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 10px; padding-left: 10px;' valign='top'><a href='https://www.linkedin.com/thisistera_' target='_blank'><img alt='LinkedIn' height='32' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Fimage_email%2Flinkedin2x.png?alt=media&token=b75749d5-4584-4add-aedb-2c2e620781be' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='LinkedIn' width='32'/></a></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 40px; padding-left: 40px; padding-top: 15px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:15px;padding-right:40px;padding-bottom:10px;padding-left:40px;'>
                      <div style='line-height: 1.5; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;'>
                      <p style='font-size: 12px; line-height: 1.5; word-break: break-word; text-align: center; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px; margin: 0;'><span style='color: #95979c; font-size: 12px;'>Block 19 zone B central market, Obafemi Awolowo University,<br/>Ile-Ife Osun state Nigeria</span></p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <table border='0' cellpadding='0' cellspacing='0' class='divider' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 25px; padding-right: 40px; padding-bottom: 10px; padding-left: 40px;' valign='top'>
                      <table align='center' border='0' cellpadding='0' cellspacing='0' class='divider_content' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #555961; width: 100%;' valign='top' width='100%'>
                      <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                      <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' valign='top'><span></span></td>
                      </tr>
                      </tbody>
                      </table>
                      </td>
                      </tr>
                      </tbody>
                      </table>
                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 40px; padding-left: 40px; padding-top: 20px; padding-bottom: 30px; font-family: Tahoma, sans-serif'><![endif]-->
                      <div style='color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:20px;padding-right:40px;padding-bottom:30px;padding-left:40px;'>
                      <div style='line-height: 1.8; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 22px;'>
                      <p style='font-size: 12px; line-height: 1.8; word-break: break-word; text-align: center; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 22px; margin: 0;'><span style='color: #95979c; font-size: 12px;'>Terabyte2020 Copyright © 2020</span></p>
                      </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                      </div>
                      <!--<![endif]-->
                      </div>
                      </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
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
                      </html>";
                      $mail->AltBody = "This is the plain text version of the email content";
                      // mail system
                      if(!$mail->send()) 
                      {
                          echo "EMAIL NOT SENT";
                      } else {
                          echo "EMAIL SENT";
                      }
                        } else {
                            echo "ERROR AT FINISH OUT";
                        }
                    } else {
                        echo "ACCOUNT TRANSACTION ERROR";
                    }
                } else {
                    echo "ERROR ACCOUNT UPDATE";
                }
            } else {
                echo "ERROR WITH POST UPDATE";
            }
        }
        // END CALCULATION
        } else {
            echo "THIS AD HAS A PROBLEM WITH THE PROMOTION";
        }
    }
} else {
    echo "NO AD IS ENDING TODAY";
}
?>