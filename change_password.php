<?php
include("material.php");
// include("function/db/connect.php");
require_once "bat/phpmailer/PHPMailerAutoload.php";


?>


<div class="row">
      <div class="col-md-4 ml-auto mr-auto">
      <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="#0">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $fullname; ?></h4>
    <p class="card-text">
    <!-- <a href="getkey.php?getme=<?php echo $codex ?>" target="_blank" value="button2" class="btn btn-primary btn-link btn-wd btn-sm">getcode</a> -->
    <form class="form" method="POST" >
        <p class="description text-center" style="color: green;"><?php echo "Changing Password?"; ?></p>
            <div class="card-body">
                
                <div class="form-group bmd-form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                        </div>
                        <input hidden type="text" value="<?php echo $passage; ?>" id="opo4">
                        <input type="password" placeholder="New Password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group bmd-form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons">done_all</i></div>
                        </div>
                        <input type="password"  placeholder="Confirm Password" class="form-control" required>
                    </div>
                </div>
                <p>
                 
                 </p>
                <div class="justify-content-center">
                    <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Change Password</button>
                </div>
            </div>
    </form>
    </p>
  </div>
</div>
      </div>
</div>

