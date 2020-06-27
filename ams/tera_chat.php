<?php
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
                            <li>
                                <div class="message-center chat-scroll chat-users">
                                    <a href="javascript:void(0)" class="chat-user message-item" id='chat_user_1' data-user-id='1'>
                                        <span class="user-img"> 
                                            <img src="../user_img/log.jpeg" alt="user" class="rounded-circle"> 
                                            <span class="profile-status online pull-right"></span> 
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title" data-username="Pavan kumar">CEO Pinza</h5> 
                                            <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> 
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="chat-user message-item" id='chat_user_7' data-user-id='7'>
                                        <span class="user-img"> 
                                            <img src="../user_img/log.jpeg" alt="user" class="rounded-circle"> 
                                            <span class="profile-status offline pull-right"></span>
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title" data-username="Pavan kumar">CEO Terabyte</h5>
                                            <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> 
                                         </div>
                                    </a>
                                    <!-- Message -->
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="chat-user message-item" id='chat_user_8' data-user-id='8'>
                                        <span class="user-img"> 
                                            <img src="../user_img/log.jpeg" alt="user" class="rounded-circle"> 
                                            <span class="profile-status offline pull-right"></span> 
                                        </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title" data-username="Varun Dhavan">Pinza Tech</h5> 
                                            <span class="mail-desc">Just see the my admin!</span> 
                                            <span class="time">9:02 AM</span> 
                                        </div>
                                    </a>
                                    <!-- Message -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Left Part  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right Part  Mail Compose -->
                <!-- ============================================================== -->
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
                                    <ul class="chat-list chat" data-user-id="1">
                                        <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">CEO Terabyte</h5>
                                                <p class="font-light mb-0">Hi, All!</p>
                                                <div class="chat-time">10.56 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">CEO Pinza</h5>
                                                <p class="font-light mb-0">Hello, Thanks for The Advice!</p>
                                                <div class="chat-time">11.00 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Pinza Tech</h5>
                                                <p class="font-light mb-0">Hi, CEO Tera and Pinza,</p>
                                                <div class="chat-time">11.02 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Jeffereson</h5>
                                                <p class="font-light mb-0">Hi, Whats Going on?</p>
                                                <div class="chat-time">11.04 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                    </ul>
                                    <!--User 2 -->
                                    <ul class="chat-list chat" data-user-id="2">
                                        <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Sonu Nigam</h5>
                                                <p class="font-light mb-0">Hi, All!</p>
                                                <div class="chat-time">10.56 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.00 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Ritesh</h5>
                                                <p class="font-light mb-0">Hi, Sonu and Genelia,</p>
                                                <div class="chat-time">11.02 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.04 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                    </ul>
                                    <!--User 3 -->
                                    <ul class="chat-list chat" data-user-id="3">
                                        <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Sonu Nigam</h5>
                                                <p class="font-light mb-0">Hi, All!</p>
                                                <div class="chat-time">10.56 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.00 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Ritesh</h5>
                                                <p class="font-light mb-0">Hi, Sonu and Genelia,</p>
                                                <div class="chat-time">11.02 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.04 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                    </ul>
                                    <!--User 4 -->
                                    <ul class="chat-list chat" data-user-id="4">
                                        <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Sonu Nigam</h5>
                                                <p class="font-light mb-0">Hi, All!</p>
                                                <div class="chat-time">10.56 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.00 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Ritesh</h5>
                                                <p class="font-light mb-0">Hi, Sonu and Genelia,</p>
                                                <div class="chat-time">11.02 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.04 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                    </ul>
                                    <!--User 5 -->
                                    <ul class="chat-list chat" data-user-id="5">
                                        <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Sonu Nigam</h5>
                                                <p class="font-light mb-0">Hi, All!</p>
                                                <div class="chat-time">10.56 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.00 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Ritesh</h5>
                                                <p class="font-light mb-0">Hi, Sonu and Genelia,</p>
                                                <div class="chat-time">11.02 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.04 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                    </ul>
                                    <!--User 6 -->
                                    <ul class="chat-list chat" data-user-id="6">
                                        <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Sonu Nigam</h5>
                                                <p class="font-light mb-0">Hi, All!</p>
                                                <div class="chat-time">10.56 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.00 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Ritesh</h5>
                                                <p class="font-light mb-0">Hi, Sonu and Genelia,</p>
                                                <div class="chat-time">11.02 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.04 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                    </ul>
                                    <!--User 7 -->
                                    <ul class="chat-list chat" data-user-id="7">
                                        <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Sonu Nigam</h5>
                                                <p class="font-light mb-0">Hi, All!</p>
                                                <div class="chat-time">10.56 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.00 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Ritesh</h5>
                                                <p class="font-light mb-0">Hi, Sonu and Genelia,</p>
                                                <div class="chat-time">11.02 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.04 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                    </ul>
                                    <!--User 8 -->
                                    <ul class="chat-list chat" data-user-id="8">
                                        <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Sonu Nigam</h5>
                                                <p class="font-light mb-0">Hi, All!</p>
                                                <div class="chat-time">10.56 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.00 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="chat-item">
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Ritesh</h5>
                                                <p class="font-light mb-0">Hi, Sonu and Genelia,</p>
                                                <div class="chat-time">11.02 am</div>
                                              </div>
                                          </div>
                                      </li>
                                      <!--chat Row -->
                                      <li class="odd chat-item">
                                          <div class="chat-content">
                                              <div class="box bg-light-success">
                                                <h5 class="font-medium">Genelia</h5>
                                                <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                                <div class="chat-time">11.04 am</div>
                                              </div>
                                          </div>
                                          <div class="chat-img"><img src="../user_img/log.jpeg" alt="user"></div>
                                      </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body border-top border-bottom chat-send-message-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-field mt-0 mb-0">
                                            <input id="textarea1" placeholder="Type and hit enter" style="font-family:Arial, FontAwesome" class="message-type-box form-control border-0" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
include("footer.php");
?>