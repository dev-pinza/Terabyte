<?php
include("material.php");
include("function/db/connect.php");
require_once "bat/phpmailer/PHPMailerAutoload.php";
// finsh off here
session_start();

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
    <form class="form" method="POST">
        <p class="description text-center" style="color: green;"><?php echo $mx; ?></p>
            <div class="card-body">
                <div class="form-group bmd-form-group">
                    <br>
                     <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons">code</i></div>
                        </div>
                        <input type="text" name="code" placeholder="Code" class="form-control" required>
                    </div>
                </div>
                <div class="justify-content-center">
                    <button type="submit" name="button2" value="button2" class="btn btn-primary btn-link btn-wd btn-lg">SUBMIT</button>
                </div>
            </div>
    </form>
    </p>
  </div>
</div>
</div>
</div>