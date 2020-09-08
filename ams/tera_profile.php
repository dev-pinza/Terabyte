<?php
$web_title = "Profile Settings";
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
                                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $fullname ?>" class="form-control form-control-line" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="<?php echo $email ?>" class="form-control form-control-line" name="example-email" id="example-email" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" readonly value="<?php echo $user_phone; ?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Old Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">New Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div id="in_rec"></div>
                                            <div class="form-group">
                                            <input type="text" value="<?php echo $user_id; ?>" id ="user_id" hidden>
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
                                                    <select id="add_in" class="form-control form-control-line">
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
                                                    <button class="btn btn-success">Update Profile</button>
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