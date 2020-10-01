<?php
// include connection
include("../function/db/connect.php");
// now get the email.
require_once "../bat/phpmailer/PHPMailerAutoload.php";

$query_users = mysqli_query($connection, "SELECT * FROM `users` ORDER BY id ASC");
if (mysqli_num_rows($query_users) > 0) {
    // send email\
    while ($x = mysqli_fetch_array($query_users)) {
        $email = $x["email"];
        $fullname = $x["fullname"];
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
          $mail->Subject = "$fullname HAPPY (HAPPY INDEPENDENCE DAY 🥳 & NEW MONTH)";
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
              <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
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
                  @media (max-width: 620px) {
          
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
          
          <body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #202b72;'>
              <!--[if IE]><div class='ie-browser'><![endif]-->
              <table class='nl-container' style='table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #202b72; width: 100%;' cellpadding='0' cellspacing='0' role='presentation' width='100%' bgcolor='#202b72' valign='top'>
                  <tbody>
                      <tr style='vertical-align: top;' valign='top'>
                          <td style='word-break: break-word; vertical-align: top;' valign='top'>
                              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:#202b72'><![endif]-->
                              <div style='background-color:transparent;'>
                                  <div class='block-grid two-up no-stack' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #3f4b94;'>
                                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#3f4b94;'>
                                          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#3f4b94'><![endif]-->
                                          <!--[if (mso)|(IE)]><td align='center' width='300' style='background-color:#3f4b94;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 15px; padding-left: 15px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                                          <div class='col num6' style='max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 15px; padding-left: 15px;'>
                                                      <!--<![endif]-->
                                                      <div class='img-container left fixedwidth' align='left' style='padding-right: 20px;padding-left: 20px;'>
                                                          <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 20px;padding-left: 20px;' align='left'><![endif]-->
                                                          <div style='font-size:1px;line-height:20px'>&nbsp;</div><a href='http://www.example.com' target='_blank' style='outline:none' tabindex='-1'> <img class='left fixedwidth' border='0' src='https://firebasestorage.googleapis.com/v0/b/terabrand.appspot.com/o/logo%2Ftera1.png?alt=media&amp;token=266a0398-7f76-46ba-8297-c487137df252' alt='Your Logo' title='Your Logo' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 108px; display: block;' width='108'></a>
                                                          <div style='font-size:1px;line-height:20px'>&nbsp;</div>
                                                          <!--[if mso]></td></tr></table><![endif]-->
                                                      </div>
                                                      <!--[if (!mso)&(!IE)]><!-->
                                                  </div>
                                                  <!--<![endif]-->
                                              </div>
                                          </div>
                                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                          <!--[if (mso)|(IE)]></td><td align='center' width='300' style='background-color:#3f4b94;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 15px; padding-left: 15px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                                          <div class='col num6' style='max-width: 320px; min-width: 300px; display: table-cell; vertical-align: top; width: 300px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 15px; padding-left: 15px;'>
                                                      <!--<![endif]-->
                                                      <table class='divider' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' role='presentation' valign='top'>
                                                          <tbody>
                                                              <tr style='vertical-align: top;' valign='top'>
                                                                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                                                                      <table class='divider_content' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 5px; width: 100%;' align='center' role='presentation' height='5' valign='top'>
                                                                          <tbody>
                                                                              <tr style='vertical-align: top;' valign='top'>
                                                                                  <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' height='5' valign='top'><span></span></td>
                                                                              </tr>
                                                                          </tbody>
                                                                      </table>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                                                      <div style='color:#ffffff;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                          <div style='line-height: 1.2; font-size: 12px; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;'>
                                                              <p style='font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin: 0;'>1ST OCTOBER 2020</p>
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
                              <div style='background-color:transparent;'>
                                  <div class='block-grid mixed-two-up' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #3f4b94;'>
                                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#3f4b94;'>
                                          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#3f4b94'><![endif]-->
                                          <!--[if (mso)|(IE)]><td align='center' width='400' style='background-color:#3f4b94;width:400px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 15px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                                          <div class='col num8' style='display: table-cell; vertical-align: top; min-width: 320px; max-width: 400px; width: 400px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 15px; padding-left: 0px;'>
                                                      <!--<![endif]-->
                                                      <div class='img-container center autowidth' align='center' style='padding-right: 0px;padding-left: 0px;'>
                                                          <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img class='center autowidth' align='center' border='0' src='https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1946/header-img.png' alt='Happy Woman' title='Happy Woman' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 385px; display: block;' width='385'>
                                                          <!--[if mso]></td></tr></table><![endif]-->
                                                      </div>
                                                      <!--[if (!mso)&(!IE)]><!-->
                                                  </div>
                                                  <!--<![endif]-->
                                              </div>
                                          </div>
                                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                          <!--[if (mso)|(IE)]></td><td align='center' width='200' style='background-color:#3f4b94;width:200px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:25px;'><![endif]-->
                                          <div class='col num4' style='display: table-cell; vertical-align: top; max-width: 320px; min-width: 200px; width: 200px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:25px; padding-right: 0px; padding-left: 0px;'>
                                                      <!--<![endif]-->
                                                      <table class='divider' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' role='presentation' valign='top'>
                                                          <tbody>
                                                              <tr style='vertical-align: top;' valign='top'>
                                                                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                                                                      <table class='divider_content' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 65px; width: 100%;' align='center' role='presentation' height='65' valign='top'>
                                                                          <tbody>
                                                                              <tr style='vertical-align: top;' valign='top'>
                                                                                  <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' height='65' valign='top'><span></span></td>
                                                                              </tr>
                                                                          </tbody>
                                                                      </table>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 5px; padding-left: 5px; padding-top: 5px; padding-bottom: 5px; font-family: Tahoma, sans-serif'><![endif]-->
                                                      <div style='color:#ffffff;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;'>
                                                          <div style='line-height: 1.2; font-size: 12px; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;'>
                                                              <p style='font-size: 24px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 29px; margin: 0;'><span style='font-size: 24px;'>Happy new month everyone</span></p>
                                                          </div>
                                                      </div>
                                                      <!--[if mso]></td></tr></table><![endif]-->
                                                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 5px; padding-left: 5px; padding-top: 5px; padding-bottom: 5px; font-family: Tahoma, sans-serif'><![endif]-->
                                                      <div style='color:#ffffff;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;'>
                                                          <div style='line-height: 1.5; font-size: 12px; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;'>
                                                              <p style='line-height: 1.5; word-break: break-word; mso-line-height-alt: 18px; margin: 0;'>It's been sixty years of steady growth fraught with many challenges. Forward is the only way to go, However far ahead is leads.... and if we keep moving, we'll be OK.</p>
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
                              <div style='background-color:transparent;'>
                                  <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #3f4b94;'>
                                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#3f4b94;'>
                                          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#3f4b94'><![endif]-->
                                          <!--[if (mso)|(IE)]><td align='center' width='600' style='background-color:#3f4b94;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                                          <div class='col num12' style='min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                                                      <!--<![endif]-->
                                                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                                                      <div style='color:#ffffff;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                          <div style='line-height: 1.2; font-size: 12px; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;'>
                                                              <p style='font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;'><span style='font-size: 14px;'>#WE ARE&nbsp; <span style='color: #66e0c3;'><strong>TERABYTES</strong></span></span></p>
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
                              <div style='background-color:transparent;'>
                                  <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #3f4b94;'>
                                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#3f4b94;'>
                                          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#3f4b94'><![endif]-->
                                          <!--[if (mso)|(IE)]><td align='center' width='600' style='background-color:#3f4b94;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                                          <div class='col num12' style='min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                                                      <!--<![endif]-->
                                                      <!--[if !mso]><!-->
                                                      <div class='desktop_hide' style='mso-hide: all; display: none; max-height: 0px; overflow: hidden;'>
                                                          <div class='img-container center autowidth' align='center' style='padding-right: 0px;padding-left: 0px;'>
                                                              <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img class='center autowidth' align='center' border='0' src='https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/587540_569169/editor_images/9c60e2c9-6231-414d-aba4-d1fa90be526f.jpg' alt='Alternate text' title='Alternate text' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 600px; display: block;' width='600'>
                                                              <!--[if mso]></td></tr></table><![endif]-->
                                                          </div>
                                                      </div>
                                                      <!--<![endif]-->
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
                                  <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #3f4b94;'>
                                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#3f4b94;'>
                                          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#3f4b94'><![endif]-->
                                          <!--[if (mso)|(IE)]><td align='center' width='600' style='background-color:#3f4b94;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:15px; padding-bottom:15px;'><![endif]-->
                                          <div class='col num12' style='min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 0px; padding-left: 0px;'>
                                                      <!--<![endif]-->
                                                      <div class='img-container center fixedwidth' align='center' style='padding-right: 10px;padding-left: 10px;'>
                                                          <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 10px;padding-left: 10px;' align='center'><![endif]-->
                                                          <div style='font-size:1px;line-height:20px'>&nbsp;</div><img class='center fixedwidth' align='center' border='0' src='https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1946/separador_points.png' alt='Alternate text' title='Alternate text' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 120px; display: block;' width='120'>
                                                          <div style='font-size:1px;line-height:20px'>&nbsp;</div>
                                                          <!--[if mso]></td></tr></table><![endif]-->
                                                      </div>
                                                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                                                      <div style='color:#ffffff;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                          <div style='line-height: 1.2; font-size: 12px; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;'>
                                                              <p style='font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;'>WELCOME TO THE TERABYTE</p>
                                                          </div>
                                                      </div>
                                                      <!--[if mso]></td></tr></table><![endif]-->
                                                      <div class='button-container' align='center' style='padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                          <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;'><tr><td style='padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px' align='center'><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='https://www.thisistera.com/login.php' style='height:33pt; width:132pt; v-text-anchor:middle;' arcsize='82%' strokeweight='0.75pt' strokecolor='#FFFFFF' fill='false'><w:anchorlock/><v:textbox inset='0,0,0,0'><center style='color:#ffffff; font-family:Tahoma, sans-serif; font-size:14px'><![endif]--><a href='https://www.thisistera.com/login.php' target='_blank' style='-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: transparent; border-radius: 36px; -webkit-border-radius: 36px; -moz-border-radius: 36px; width: auto; width: auto; border-top: 1px solid #FFFFFF; border-right: 1px solid #FFFFFF; border-bottom: 1px solid #FFFFFF; border-left: 1px solid #FFFFFF; padding-top: 5px; padding-bottom: 5px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;'><span style='padding-left:30px;padding-right:30px;font-size:14px;display:inline-block;'><span style='font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;'><strong><span style='font-size: 14px; line-height: 28px;' data-mce-style='font-size: 14px; line-height: 28px;'>SIGN IN</span></strong></span></span></a>
                                                          <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                                                      </div>
                                                      <div class='img-container center fixedwidth' align='center' style='padding-right: 10px;padding-left: 10px;'>
                                                          <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 10px;padding-left: 10px;' align='center'><![endif]-->
                                                          <div style='font-size:1px;line-height:20px'>&nbsp;</div><img class='center fixedwidth' align='center' border='0' src='https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1946/separador_points.png' alt='Alternate text' title='Alternate text' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 120px; display: block;' width='120'>
                                                          <div style='font-size:1px;line-height:20px'>&nbsp;</div>
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
                                  <div class='block-grid three-up no-stack' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #525d9f;'>
                                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#525d9f;'>
                                          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#525d9f'><![endif]-->
                                          <!--[if (mso)|(IE)]><td align='center' width='150' style='background-color:#525d9f;width:150px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:15px; padding-bottom:15px;'><![endif]-->
                                          <div class='col num3' style='display: table-cell; vertical-align: top; max-width: 320px; min-width: 150px; width: 150px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 0px; padding-left: 0px;'>
                                                      <!--<![endif]-->
                                                      <div class='mobile_hide'>
                                                          <div class='img-container center autowidth' align='center' style='padding-right: 0px;padding-left: 0px;'>
                                                              <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img class='center autowidth' align='center' border='0' src='https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1946/decoration-1.png' alt='Side Ornaments' title='Side Ornaments' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 150px; display: block;' width='150'>
                                                              <!--[if mso]></td></tr></table><![endif]-->
                                                          </div>
                                                      </div>
                                                      <!--[if (!mso)&(!IE)]><!-->
                                                  </div>
                                                  <!--<![endif]-->
                                              </div>
                                          </div>
                                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                          <!--[if (mso)|(IE)]></td><td align='center' width='300' style='background-color:#525d9f;width:300px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:15px; padding-bottom:15px;'><![endif]-->
                                          <div class='col num6' style='display: table-cell; vertical-align: top; max-width: 320px; min-width: 300px; width: 300px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 0px; padding-left: 0px;'>
                                                      <!--<![endif]-->
                                                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                                                      <div style='color:#ffffff;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                          <div style='line-height: 1.2; font-size: 12px; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;'>
                                                              <p style='font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;'>EXCLUSIVE CROWVERTISMENT!</p>
                                                          </div>
                                                      </div>
                                                      <!--[if mso]></td></tr></table><![endif]-->
                                                      <table class='divider' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' role='presentation' valign='top'>
                                                          <tbody>
                                                              <tr style='vertical-align: top;' valign='top'>
                                                                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                                                                      <table class='divider_content' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #FFFFFF; width: 100%;' align='center' role='presentation' valign='top'>
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
                                                      <div class='img-container center fixedwidth' align='center' style='padding-right: 0px;padding-left: 0px;'>
                                                          <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]-->
                                                          <div style='font-size:1px;line-height:10px'>&nbsp;</div><img class='center fixedwidth' align='center' border='0' src='https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1946/discount.png' alt='Discount Number' title='Discount Number' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 165px; display: block;' width='165'>
                                                          <div style='font-size:1px;line-height:10px'>&nbsp;</div>
                                                          <!--[if mso]></td></tr></table><![endif]-->
                                                      </div>
                                                      <table class='divider' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' role='presentation' valign='top'>
                                                          <tbody>
                                                              <tr style='vertical-align: top;' valign='top'>
                                                                  <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                                                                      <table class='divider_content' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #FFFFFF; width: 100%;' align='center' role='presentation' valign='top'>
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
                                                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                                                      <div style='color:#ffffff;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                          <div style='line-height: 1.2; font-size: 12px; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;'>
                                                              <p style='font-size: 12px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 14px; margin: 0;'><span style='font-size: 12px;'>VALID UNTIL 1/10/2020</span></p>
                                                          </div>
                                                      </div>
                                                      <!--[if mso]></td></tr></table><![endif]-->
                                                      <!--[if (!mso)&(!IE)]><!-->
                                                  </div>
                                                  <!--<![endif]-->
                                              </div>
                                          </div>
                                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                          <!--[if (mso)|(IE)]></td><td align='center' width='150' style='background-color:#525d9f;width:150px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:15px; padding-bottom:15px;'><![endif]-->
                                          <div class='col num3' style='display: table-cell; vertical-align: top; max-width: 320px; min-width: 150px; width: 150px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 0px; padding-left: 0px;'>
                                                      <!--<![endif]-->
                                                      <div class='mobile_hide'>
                                                          <div class='img-container center autowidth' align='center' style='padding-right: 0px;padding-left: 0px;'>
                                                              <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img class='center autowidth' align='center' border='0' src='https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1946/decoration-2.png' alt='Side Ornaments' title='Side Ornaments' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 150px; display: block;' width='150'>
                                                              <!--[if mso]></td></tr></table><![endif]-->
                                                          </div>
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
                                  <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #3f4b94;'>
                                      <div style='border-collapse: collapse;display: table;width: 100%;background-color:#3f4b94;'>
                                          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px'><tr class='layout-full-width' style='background-color:#3f4b94'><![endif]-->
                                          <!--[if (mso)|(IE)]><td align='center' width='600' style='background-color:#3f4b94;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 15px; padding-left: 15px; padding-top:20px; padding-bottom:20px;'><![endif]-->
                                          <div class='col num12' style='min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;'>
                                              <div style='width:100% !important;'>
                                                  <!--[if (!mso)&(!IE)]><!-->
                                                  <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:20px; padding-right: 15px; padding-left: 15px;'>
                                                      <!--<![endif]-->
                                                      <table class='social_icons' cellpadding='0' cellspacing='0' width='100%' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;' valign='top'>
                                                          <tbody>
                                                              <tr style='vertical-align: top;' valign='top'>
                                                                  <td style='word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                                                                      <table class='social_table' align='center' cellpadding='0' cellspacing='0' role='presentation' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;' valign='top'>
                                                                          <tbody>
                                                                              <tr style='vertical-align: top; display: inline-block; text-align: center;' align='center' valign='top'>
                                                                                  <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;' valign='top'><a href='https://www.facebook.com/thisistera_' target='_blank'><img width='32' height='32' src='https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-white/facebook@2x.png' alt='Facebook' title='facebook' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;'></a></td>
                                                                                  <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;' valign='top'><a href='https://www.twitter.com/thisistera_' target='_blank'><img width='32' height='32' src='https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-white/twitter@2x.png' alt='Twitter' title='twitter' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;'></a></td>
                                                                                  <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;' valign='top'><a href='https://www.linkedin.com/thisistera_' target='_blank'><img width='32' height='32' src='https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-white/linkedin@2x.png' alt='Linkedin' title='linkedin' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;'></a></td>
                                                                                  <td style='word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;' valign='top'><a href='https://www.instagram.com/thisistera_' target='_blank'><img width='32' height='32' src='https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-white/instagram@2x.png' alt='Instagram' title='instagram' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;'></a></td>
                                                                              </tr>
                                                                          </tbody>
                                                                      </table>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                                                      <div style='color:#ffffff;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                          <div style='line-height: 1.5; font-size: 12px; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;'>
                                                              <p style='font-size: 12px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin: 0;'><span style='font-size: 12px;'>#MINGLEWITHTERABYTE #WEARETERABYTES</span></p>
                                                          </div>
                                                      </div>
                                                      <!--[if mso]></td></tr></table><![endif]-->
                                                      <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif'><![endif]-->
                                                      <div style='color:#ffffff;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                          <div style='line-height: 1.5; font-size: 12px; text-align: center; color: #ffffff; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;'>
                                                              <p style='text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 18px; margin: 0;'>© Copyright 2020. Terabyte All Rights Reserved.</p>
                                                              <a style='text-decoration: underline; color: #66e0c3;' title='www.example.com' href='http://www.example.com' target='_blank' rel='noopener'>Unsubscribe</a>
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
    }
} else {
    echo "NO USER";
}
?>