<?php
session_start();
include("../../function/db/connect.php");
$send_id = $_SESSION["id"];
$send_img = $_SESSION["img"];
$id = $_POST["id"];
if ($id != "") {
   $query_chat = mysqli_query($connection, "SELECT * FROM `tera_chat` WHERE tera_chat.reciever_id = '$id' OR tera_chat.user_id = '$id' ORDER BY id ASC");
   if (mysqli_num_rows($query_chat)) {
   while ($cx = mysqli_fetch_array($query_chat)){
       $sed_id = $cx["user_id"];
       $message = $cx["message"];
       $time = $cx["timestamp"];
       $date = $cx["date"];
       $q_chat = mysqli_query($connection, "SELECT * FROM `users` WHERE id = '$sed_id'");
       $q = mysqli_fetch_array($q_chat);
       $user_img = $q["img"];
       $rec_full = $q["fullname"];
    //    check
    $arg = "chat-item";
    if ($sed_id == $send_id){
        $arg = "odd chat-item";
    } else {
        $arg = $arg;
    }
    ?>
    <!-- script end -->
    <li class="<?php echo $arg; ?>">
                                          <!-- <div class="chat-img"><img src="../client_img/<?php echo $rec_full ?>" alt="user"></div> -->
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium"><?php echo $rec_full; ?></h5>
                                                <p class="font-light mb-0"><?php echo $message; ?></p>
                                                <div class="chat-time"><?php echo $time; ?></div>
                                              </div>
                                          </div>
                                      </li>
                                      <!-- get details -->
                                      <input type="text" value="<?php echo $send_id; ?>" id="sender_id" hidden>
                                      <input type="text" value="<?php echo $id; ?>" id="rec_id" hidden>
                                      <!--chat Row -->
                                      <!-- <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">CEO Pinza</h5>
                                                <p class="font-light mb-0">Hello, Thanks for The Advice!</p>
                                                <div class="chat-time">11.00 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li> -->
                                      <!--chat Row -->
                                      <!-- <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Pinza Tech</h5>
                                                <p class="font-light mb-0">Hi, CEO Tera and Pinza,</p>
                                                <div class="chat-time">11.02 am</div>
                                              </div>
                                          </div>
                                      </li> -->
                                      <!--chat Row -->
                                      <!-- <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Jeffereson</h5>
                                                <p class="font-light mb-0">Hi, Whats Going on?</p>
                                                <div class="chat-time">11.04 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li> -->
                                      <?php
   }
} else {
    echo "NO CHAT";
}
                                      }
                                      ?>