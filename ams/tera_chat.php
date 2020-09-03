<?php
$web_title = "Tera Chat";
include("header.php");
?>
<br>
 <div class="chat-application">
                <!-- ============================================================== -->
                <!-- Left Part  -->
                <!-- ============================================================== -->
                <div class="left-part bg-white fixed-left-part user-chat-box">
                    <!-- Mobile toggle button -->
                    <a class="ti-menu ti-close btn btn-success show-left-part d-block d-md-none" href="javascript:void(0)"></a>
                    <!-- Mobile toggle button -->
                    <div class="p-3">
                        <h4>Chat Sidebar</h4>
                    </div>
                    <div class="scrollable position-relative" style="height:100%;">
                        <div class="p-3 border-bottom">
                            <h5 class="card-title">Search Contact</h5>
                            <form>
                                <div class="searchbar">
                                    <input class="form-control" type="text" placeholder="Search Contact">
                                </div>
                            </form>
                        </div>
                        <ul class="mailbox list-style-none app-chat">
                        <?php
                        $mysqli_chat = mysqli_query($connection, "SELECT * FROM `users` WHERE (usertype = 'super' OR usertype = 'man') AND username != '$username'");
                        ?>
                        <?php
                        if (mysqli_num_rows($mysqli_chat) > 0) {
                            while ($c = mysqli_fetch_array($mysqli_chat)) {
                        ?>
                            <li>
                                <div class="message-center chat-scroll chat-users">
                                    <a href="javascript:void(0)" class="chat-user message-item" id='chat_user_<?php echo $c["id"]; ?>' data-user-id='<?php echo $c["id"] ?>'>
                                        <span class="user-img"> 
                                            <img src="../client_img/<?php echo $c["img"]; ?>" alt="user" class="rounded-circle"> 
                                            <span class="profile-status online pull-right"></span> 
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title" data-username="Check"><?php echo $c["fullname"]; ?></h5> 
                                            <?php
                                            $position = $c["usertype"];
                                            if ($position == "man"){
                                                $position = "Manager";
                                            } else if ($position == "super"){
                                                $position = "Super Admin";
                                            }
                                            ?>
                                            <span class="mail-desc"><?php echo $position; ?></span> <span class="time">9:30 AM</span> 
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <!-- Message -->
                                </div>
                                <script>
                                        $(document).ready(function() {
                                            document.getElementById("data_check").setAttribute("hidden","");
                                            $('#chat_user_<?php echo $c["id"];?>').on("click", function(){
                                            var id = $(this).data("user-id");
                                            // set the data 
                                            if (id != "") {
                                                
                                                $('#data_check').attr("data-user-id",id);
                                                document.getElementById("data_check").removeAttribute("hidden");
                                                // $("#reload_chat").load("chat_box.php");
                                            }
                                        // setInterval(function() {
                                            $.ajax({
                                             url:"ajax_post/chat_room.php",
                                             method:"POST",
                                             data:{id:id},
                                             success:function(data){
                                             $('#chat_box_msg').html(data);
                                             }
                                            })
                                            });
                                        // }, 1000);
                                        });
                                    </script>
                            </li>
                            <?php
                            }
                        } else {
                            echo "NO USER AT THE MOMENT";
                        }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Left Part  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right Part  Mail Compose -->
                <div class="right-part chat-container">
                    <div class="chat-box-inner-part">
                        <div class="chat-not-selected">
                            <div class="text-center">
                                <span class="display-5 text-info"><i class="mdi mdi-comment-outline"></i></span>
                                <h5>Open chat from the list</h5>
                            </div>
                        </div>
                        <div class="card chatting-box">
                            <div class="card-body">
                                <div class="chat-meta-user pb-3 border-bottom">
                                    <div class="current-chat-user-name">
                                        <span>
                                            <img src="../user_img/log.jpeg" alt="dynamic-image" class="rounded-circle" width="45">
                                            <span class="name font-weight-bold ml-2"></span>
                                        </span>
                                    </div>
                                </div>
                                <!-- <h4 class="card-title">Chat Messages</h4> -->
                                <div class="chat-box scrollable" style="height:calc(100vh - 300px);">
                                    <!--User 1 -->
                                    
                                    <!-- <div id="reload_chat"> -->
                <!-- </div> -->
                <ul class="chat-list chat" id="data_check" data-user-id="1">
                                        <!--chat Row -->
                                        <div id="chat_box_msg"></div>
                                        <!-- check if out -->
                                    </ul>
                                    <!--User 2 -->
                                </div>
                            </div>
                            <div class="card-body border-top border-bottom chat-send-message-footer">
                                <div class="row">
                                    <div class="col-12">
                                    <script>
                                            $(document).ready(function() {
                                                $('#check_imp').on("keyup", function(event) {
                                                    // alert("HOLA");
                                                    if (event.keyCode === 13) {
                                                        var sed_id = $('#sender_id').val();
                                                        var rec_id = $('#rec_id').val();
                                                        var msg = $('#check_imp').val();
                                                        // alert("SENDER" + "SENDER: " + sed_id +  "RECEIVER: " + rec_id + "MSG " + msg);
                                                        // make an ajax post for 
                                                        $.ajax({
                                             url:"ajax_post/chat_message.php",
                                             method:"POST",
                                             data:{sed_id:sed_id, rec_id:rec_id, msg:msg},
                                             success:function(data){
                                             $('#chat_message').html(data);
                                             }
                                            });
                                                    }
                                                });
                                            });
                                        </script>
                                        <div id="chat_message"></div>
                                        <div class="input-field mt-0 mb-0">
                                            <input id="check_imp" placeholder="Type and hit enter" style="font-family:Arial, FontAwesome" class=" form-control border-0" type="text">
                                        </div>
                                        <!-- input post  -->
                                        
                                        <!-- end post -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- chat box -->
                
                <!-- chat box -->
            </div>
<?php
include("footer.php");
?>