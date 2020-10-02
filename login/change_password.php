<?php
include("header.php");
require_once "../bat/phpmailer/PHPMailerAutoload.php";
session_start();
?>
<?php
if (isset($_GET["username"])) {
    $name = $_GET["username"];
    $update = true;
	$gettheuser = mysqli_query($connection, "SELECT * FROM users WHERE username = '$name' ORDER BY id ASC LIMIT 1");
	$data = "";
    if (mysqli_num_rows($gettheuser) == 1) {
        $pop = mysqli_fetch_array($gettheuser);
        $passage = $pop['password'];
        // password test
        $vd = $pop['id'];
        $email = $pop['email'];
        $fullname = $pop["fullname"];
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
    } else {
		$data = "<b style ='color: red;'>User Registration Error - Text your username to Terabyte Group with screenshot and state the problem!</b>";
    }
} else {
    $data = "<b style ='color: red;'>NO USERNAME FOUND</b>";
}
?>
	
	<div class="container-login100" style="background-image: url('../img/social-img-2.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="finishing.php" method="POST">
			<script>
                    $(document).ready(function() {
                        $('#opo2').on("change keyup paste click", function () {
                            var id = $(this).val();
                            var check = $('#opo').val();
                            if (id == check) {
                                document.getElementById("myDiv").setAttribute("hidden","");
                                $(":input[type=submit]").prop("disabled", false);
                            } else {
                                document.getElementById("myDiv").removeAttribute("hidden");
                                $(":input[type=submit]").prop("disabled", true);
                            }
                        });
                        $('#opo').on("change keyup paste click", function () {
                            var id = $(this).val();
                            var check = $('#opo4').val();
                            $.ajax({
                                url: "../old_pass.php",
                                method: "POST",
                                data: {id:id, check:check},
                                success: function(data) {
                                  $('#myDiv2').html(data);
                                }
                            })
                        });
                    });
                </script>
				<span class="login100-form-title p-b-37" style="font-size: 16px;">
				<?php echo $fullname; ?> Change your Password
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="New Password">
					<input class="input100" type="password"  name="pass" id="opo" placeholder="Old Password">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "New Password">
					<input class="input100" type="password" name="confirm_pass" id="opo2" placeholder="New Password">
					<span class="focus-input100"></span>
				</div>

				<div>
					<center>
					<?php echo $data; ?>
					<div hidden id="myDiv">
                    <i style="color: red;">This Password Doesn't Match</i>
                 </div>
                 <div id="myDiv2">
                 </div>
					</center>
				</div>
				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Change Password
					</button>
				</div>
			</form>

			
		</div>
	</div>

	<?php
// checking if IP has been Blocked
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
$getip = mysqli_query($connection, "SELECT * FROM ip_blacklist WHERE ip_add = '$ip'");
if (mysqli_num_rows($getip) == 1) {
    $gtp = mysqli_query($connection, "SELECT * FROM ip_blacklist WHERE ip_add = '$ip'");
    if (count([$gtp]) == 1) {
    $x = mysqli_fetch_array($gtp);
    $vm = $x['trial'];
    }
  if ($vm >= 3) {
      $_SESSION = array();
     // Destroy the session.
     session_destroy();
     echo '<script type="text/javascript">
        $(document).ready(function(){
            swal.fire({
                type: "error",
                title: "IP",
                text: "THIS IP HAS BEEN BLOCKED",
                showConfirmButton: false,
                timer: 4000
            })
        });
        </script>';
        $URL="../ip/block_ip.php";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
} else {
    $digits = 5;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
$_SESSION["codex"] = $randms;
$codex = $_SESSION["codex"];
// begining of mail
$mail = new PHPMailer;
// from email addreess and name
$intemail = "info@thisistera.com";
$intname = "Terabyte";
$mail->From = $intemail;
$mail->FromName = $intname;
// to adress and name
$mail->addAddress($email, $name);
// reply address
//Address to which recipient will reply
// progressive html images
$mail->addReplyTo($intemail, "Reply");
// CC and BCC
//CC and BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");
// Send HTML or Plain Text Email
$mail->isHTML(true);
$mail->Subject = "Comfirmation Code";
$mail->Body = "Your Confirmation Code Number is: $codex";
$mail->AltBody = "This is the plain text version of the email content";
// mail system
if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} else
{
    echo $xm = "Changing Password?";
}
}
?>
<?php
include("footer.php");
?>