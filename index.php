<?php
$type = "Login";
include("header.php");
?>
<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if($_SESSION["usertype"] == "client"){
    header("location: ams/active_promo.php");
    exit;
  } 
  elseif($_SESSION["usertype"] == "rep"){
    header("location: ams/finance.php");
    exit;
  }
  elseif($_SESSION["usertype"] == "man"){
    header("location: ams/man_dash.php");
    exit;
  }
  elseif($_SESSION["usertype"] != "super"){
    header("location: ams/dashboard.php");
    exit;
  }
//   elseif($_SESSION["usertype"] == "staff"){
//       if($_SESSION["employee_status"] == "Employed"){
//         header("location: mfi/index.php");
//       }
//       elseif($_SESSION["employee_status"] == "Decommisioned"){
//         $err = "Sorry, you are not allowed to login";
//         $password = "";
//       }
//     exit;
//   }
}
 
// Include config file
require_once "function/db/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
$err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter Username or Email.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT users.id, users.username, users.email, users.password, users.usertype FROM `users` WHERE users.username = ?";
        // $sqlj = "SELECT users.id, users.int_id, users.username, users.fullname, users.usertype, users.password, org_role, display_name FROM staff JOIN users ON users.id = staff.user_id WHERE users.username = "sam"";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $email, $hashed_password, $usertype);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            session_regenerate_id();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;
                            $_SESSION["usertype"] = $usertype;
                            // $_SESSION["lastname"] = $lastname;
                            session_write_close();                            
                            //run a quick code to show active user
                            // Redirect user to welcome page
                            if ($stmt->num_rows ==1 && $_SESSION["usertype"] =="client") {
                              header("location: ams/active_promo.php");
                            }elseif ($stmt->num_rows ==1 && $_SESSION["usertype"] =="rep"){
                                header("location: ams/finance.php");
                            }elseif ($stmt->num_rows ==1 && $_SESSION["usertype"] =="man"){
                                header("location: ams/man_dash.php");
                            }elseif ($stmt->num_rows ==1 && $_SESSION["usertype"] =="super"){
                                header("location: ams/dashboard.php");
                            }
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that Username or E-mail.";
                }
            } else{
                $username_err = "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
    }
    
    // Close connection
    mysqli_close($link);
    mysqli_stmt_close($stmt);
}

?>
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(page_img/login.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <!-- <span class="db"><img src="assets/images/logos/logo-icon.png" alt="logo" /></span> -->
                        <h5 class="font-medium mb-3"><b>Terabyte</b> Sign in</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3" id="loginform" method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"></div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="username" aria-label="Username" aria-describedby="basic-addon1">
                                    <span class="help-block"><?php echo $username_err; ?></span>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"></div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                                <span class="help-block"><?php echo $password_err; ?></span>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                            <a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i class="fa fa-lock mr-1"></i> Forgot pwd?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 pb-3">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                        <div class="social">
                                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fab  fa-facebook"></i> </a>
                                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="" data-original-title="Login with Google"> <i aria-hidden="true" class="fab  fa-google-plus"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-2">
                                    <div class="col-sm-12 text-center">
                                        Don't have an account? <a href="signup.php" class="text-info ml-1"><b>Sign Up</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <span class="db">
                            <!-- <img src="assets/images/logos/logo-icon.png" alt="logo" /> -->
                        </span>
                        <h5 class="font-medium mb-3">Recover Password</h5>
                        <span>Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row mt-3">
                        <!-- Form -->
                        <form class="col-12" action="#">
                            <!-- email -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control form-control-lg" type="email" required="" placeholder="Email">
                                </div>
                            </div>
                            <!-- pwd -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-danger" id="click_me" name="action">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
<?php
include("footer.php")
?>