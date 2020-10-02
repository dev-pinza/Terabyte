<?php
$web_title = "Institution & User Management";
include("header.php");
?>
<?php
if (isset($_GET["message1"])) {
    $key = $_GET["message1"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "success",
            title: "Success",
            text: "Insitution Created",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
   }
  } else if (isset($_GET["message2"])) {
    $key = $_GET["message2"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "error",
            title: "A problem!",
            text: "Insitution Creation Failed",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
   }
  } else if (isset($_GET["message101"])) {
    $key = $_GET["message101"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "success",
            title: "Account Creation Successful",
            text: "A New User Has Been Added",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
   }
  } else if (isset($_GET["message1011"])) {
    $key = $_GET["message1011"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "success",
            title: "Account Created but Email Failed",
            text: "Please Contact This User and Send Password: Terapass2020",
            showConfirmButton: false,
            timer: 9000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
   }
  } else if (isset($_GET["message102"])) {
    $key = $_GET["message102"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "error",
            title: "A problem!",
            text: "Account Creation Failed",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
   }
  } else if (isset($_GET["message103"])) {
    $key = $_GET["message103"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "error",
            title: "A problem!",
            text: "User Creation Failed",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
   }
  } else if (isset($_GET["message104"])) {
    $key = $_GET["message104"];
    $tt = 0;
    if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "error",
            title: "A problem!",
            text: "User Exist Already",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
   }
  }
?>
 <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">All Managers/Reps</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark" data-toggle="modal"
                                                data-target="#createmodel">
                                                Create New User
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-bordered nowrap display">
                                        <thead>
                                        <?php
                        if ($usertype == "super") {
                            $query1 = "SELECT * FROM `users` WHERE usertype = 'man' OR usertype = 'rep'";
                        } else if ($usertype == "man") {
                            $query1 = "SELECT * FROM `users` WHERE usertype = 'rep' AND int_id = '$int_id'";
                        }
                        $result1 = mysqli_query($connection, $query1);
                      ?>
                                            <tr>
                                                <th> </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>Institution</th>
                                                <th>DOB</th>
                                                <th>Joining date</th>
                                                <th>Identfication(Matric, Phone)</th>
                                                <th>Earning</th>
                                                <th>Action</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {?>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customControlValidation25" required>
                                                        <label class="custom-control-label"
                                                            for="customControlValidation25"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#"><img
                                                            src="../client_img/<?php echo $row1["img"] ?>" alt="user"
                                                            class="rounded-circle" width="30" /> <?php echo $row1["fullname"]; ?></a>
                                                </td>
                                                <td><?php echo $row1["email"];?></td>
                                                <td><?php echo $row1["phone"] ?></td>
                                                <?php
                                                if ($row1["usertype"] == "rep") {
                                                    $t = "Rep";
                                                } else if ($row1["usertype"] == "man") {
                                                    $t = "Manager";
                                                }
                                                ?>
                                                <td><span class="label label-inverse"><?php echo $t; ?></span></td>
                                                <?php
                                                $int = $row1["int_id"];
                                                $slect_int = mysqli_query($connection, "SELECT * FROM `institution` WHERE id ='$int'");
                                                $mp = mysqli_fetch_array($slect_int);
                                                $int_name = $mp["name"];
                                                ?>
                                                <td><span class="label label-inverse"><?php echo $int_name; ?></span></td>
                                                <td><?php echo $row1["dob"]; ?></td>
                                                <td><?php echo $row1["created_date"]; ?></td>
                                                <?php
                                                $mx = $row1["matric"]; 
                                                if ($mx == '0' || $mx == NULL) {
                                                    $mx = "No ID, tell user to update";
                                                } else {
                                                    $mx = $mx;
                                                }
                                                ?>
                                                <td><span class="label label-inverse"><?php echo $mx;?></span></td>
                                                <?php
                                                $u_id = $row1["id"];
                                                $slect_aintx = mysqli_query($connection, "SELECT * FROM `account` WHERE user_id ='$u_id'");
                                                $acx = mysqli_fetch_array($slect_aintx);
                                                $earning = $acx["balance_derived"];
                                                ?>
                                                <td>NGN <?php echo number_format($earning, 2);?></td>
                                                <td>
                                                <?php 
                                                    if ($row1["is_approved"] == 1) {?>
                                                    <a href="../function/disable_user.php?del=<?php echo $row1["id"]; ?>"
                                                        class="btn btn-warning btn-pure btn-outline delete-row-btn"
                                                        data-toggle="tooltip" data-original-title="Disable">
                                                        <i class="ti-close" aria-hidden="true"></i>
                                                        Decommission
                                                    </a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <a href="../function/approve_user.php?del=<?php echo $row1["id"]; ?>"
                                                        class="btn btn-success btn-pure btn-outline delete-row-btn"
                                                        data-toggle="tooltip" data-original-title="Enable"><i
                                                            class="ti-check" aria-hidden="true">
                                                            Approve Rep
                                                        </i>
                                                        </a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                <a href="../function/delete_user.php?del=<?php echo $row1["id"]; ?>"
                                                        class="btn btn-danger btn-pure btn-outline delete-row-btn"
                                                        data-toggle="tooltip" data-original-title="Delete">
                                                        Delete Permanently
                                                        </a>
                                                </td>
                                            </tr>
                                             <?php }
                                          }
                                    else {
                                    // echo "0 Document";
                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- check -->
                        <!-- START CLIENT -->
                        <?php 
                          if ($usertype == "super") {
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">All Registered Client</h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-bordered nowrap display">
                                        <thead>
                                        <?php
                        if ($usertype == "super") {
                            $query1 = "SELECT * FROM `users` WHERE usertype = 'client'";
                        }
                        $result1 = mysqli_query($connection, $query1);
                      ?>
                                            <tr>
                                                <th> </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>DOB</th>
                                                <th>Joining date</th>
                                                <th>Balance</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {?>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customControlValidation25" required>
                                                        <label class="custom-control-label"
                                                            for="customControlValidation25"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#"><img
                                                            src="../client_img/<?php echo $row1["img"] ?>" alt="user"
                                                            class="rounded-circle" width="30" /> <?php echo $row1["fullname"]; ?></a>
                                                </td>
                                                <td><?php echo $row1["email"];?></td>
                                                <td><?php echo $row1["phone"] ?></td>
                                                <td><span class="label label-inverse"><?php echo $row1["usertype"]; ?></span></td>
                                                <td><?php echo $row1["dob"]; ?></td>
                                                <td><?php echo $row1["created_date"]; ?></td>
                                                <?php
                                                $u_id = $row1["id"];
                                                $slect_aintx = mysqli_query($connection, "SELECT * FROM `account` WHERE user_id ='$u_id'");
                                                $acx = mysqli_fetch_array($slect_aintx);
                                                $earning = $acx["balance_derived"];
                                                ?>
                                                <td>NGN <?php echo number_format($earning, 2);?></td>
                                                <td>
                                                <a href="../function/delete_user.php?del=<?php echo $row1["id"]; ?>"
                                                        class="btn btn-danger btn-pure btn-outline delete-row-btn"
                                                        data-toggle="tooltip" data-original-title="Delete">
                                                        Delete Permanently
                                                        </a>
                                                </td>
                                            </tr>
                                             <?php }
                                          }
                                    else {
                                    // echo "0 Document";
                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                          }
                        ?>
                        <!-- END CLIENT -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">All Institution</h4>
                                    <?php
                                    if ($usertype == "super") {
                                    ?>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark" data-toggle="modal"
                                                data-target="#createmodelint">
                                                Create New Institution
                                            </button>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_exportm" class="table table-bordered nowrap display">
                                        <thead>
                                        <?php
                                        if ($usertype == "super") {
                                            $query = "SELECT * FROM `institution` WHERE active = '1'";
                                        } else if ($usertype == "man") {
                                            $query = "SELECT * FROM `institution` WHERE id = '$int_id' AND active = '1'";
                                        }
                        
                        $result = mysqli_query($connection, $query);
                      ?>
                                            <tr>
                                                <!-- <th> </th> -->
                                                <th>Name</th>
                                                <th>State</th>
                                                <th>Country</th>
                                                <th>Date Created</th>
                                                <th>Total Audience</th>
                                                <th>Key Manager</th>
                                                <th>Modify</th>
                                                <!-- <th>Joining date</th>
                                                <th>Earning</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
                                            <tr>
                                                <td>
                                                    <a href="#"> <?php echo $row["name"];?></a>
                                                </td>
                                                <td><?php echo $row["state"];?></td>
                                                <td><?php echo $row["country"];?></td>
                                                <td><?php echo $row["date_created"];?></td>
                                                <td><span class="label label-inverse"><?php echo $row["population"];?></span></td>
                                                <?php 
                                                $km = $row["key_manager"];
                                                if ($km != "" AND $km != "0" AND $km != 0 AND $km != "") {
                                                    $ui = mysqli_query($connection, "SELECT * FROM users WHERE id = '$km'");
                                                    $tp = mysqli_fetch_array($ui);
                                                    $km = $tp["fullname"];
                                                } else {
                                                    $km = "Non";
                                                }
                                                ?>
                                                <td><span class="label label-inverse"><?php echo $km; ?></span></td>
                                                <td>
                                                <a href="edit_int.php?edit=<?php echo $row["id"] ?>"
                                                        class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                                                        data-toggle="tooltip" data-original-title="Edit"><i
                                                            class="ti-pencil" aria-hidden="true"></i></a></td>
                                                <!-- <td>18-05-2020</td>
                                                <td>NGN 4200</td> -->
                                            </tr>
                                            <?php }
                                          }
                                    else {
                                    // echo "0 Document";
                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <!-- <div class="col-md-4">
                        <div class="card">
                            <div class="border-bottom p-3">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Sharemodel"
                                    style="width: 100%">
                                    <i class="ti-share mr-2"></i> Share With
                                </button>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search Users Here..."
                                            aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <button class="btn btn-info">Ok</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="list-group mt-4">
                                    <a href="javascript:void(0)" class="list-group-item active"><i
                                            class="ti-layers mr-2"></i> All Users</a>
                                    <a href="javascript:void(0)" class="list-group-item"><i class="ti-star mr-2"></i>
                                        Favourite Users</a>
                                    <a href="javascript:void(0)" class="list-group-item"><i
                                            class="ti-bookmark mr-2"></i> Recently Created</a>
                                </div>
                                <h4 class="card-title mt-4">Groups</h4>
                                <div class="list-group">
                                    <a href="javascript:void(0)" class="list-group-item"><i
                                            class="ti-flag-alt-2 mr-2"></i> Success Warriers
                                        <span class="badge badge-info float-right">20</span>
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item"><i class="ti-notepad mr-2"></i>
                                        Project
                                        <span class="badge badge-success float-right">12</span>
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item"><i class="ti-target mr-2"></i>
                                        Tech support
                                        <span class="badge badge-dark float-right">22</span>
                                    </a>
                                </div>
                                <h4 class="card-title mt-4">More</h4>
                                <div class="list-group">
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-info mr-2"><i class="ti-import"></i></span> Import
                                        Users
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-warning text-white mr-2"><i
                                                class="ti-export"></i></span> Export Users
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-success mr-2"><i class="ti-share-alt"></i></span>
                                        Restore Users
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-primary mr-2"><i class="ti-layers-alt"></i></span>
                                        Duplicate Users
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-danger mr-2"><i class="ti-trash"></i></span> Delete All
                                        Users
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Column -->
                </div>
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
            <!-- djj -->
            <div class="modal fade" id="Sharemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-auto-fix mr-2"></i>
                                    Share With</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Name Here"
                                        aria-label="Username">
                                </div>
                                <div class="row">
                                    <div class="col-3 text-center">
                                        <a href="#Whatsapp" class="text-success">
                                            <i class="display-6 mdi mdi-whatsapp"></i><br><span
                                                class="text-muted">Whatsapp</span>
                                        </a>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a href="#Facebook" class="text-info">
                                            <i class="display-6 mdi mdi-facebook"></i><br><span
                                                class="text-muted">Facebook</span>
                                        </a>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a href="#Instagram" class="text-danger">
                                            <i class="display-6 mdi mdi-instagram"></i><br><span
                                                class="text-muted">Instagram</span>
                                        </a>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a href="#Skype" class="text-cyan">
                                            <i class="display-6 mdi mdi-skype"></i><br><span
                                                class="text-muted">Skype</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>
                                    Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Create Modal -->
            <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="../create_user.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Create
                                    New User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <label for="">Username</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Username Here"
                                        aria-label="name" id="uxu" name="un" required>
                                </div>
                                <label for="">Fullname</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Firstname Lastname"
                                        aria-label="name" id="" name="fn" required>
                                </div>
                                <label for="">E-mail</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-email text-white"></i></button>
                                    <input type="email" class="form-control" placeholder="Enter Email Here"
                                        aria-label="name" name="em" id="emj" required>
                                </div>
                                <label for="">Gender</label>
    <div class="input-group mb-3">
    <button type="button" class="btn btn-info"><i
    class="ti-face-smile text-white"></i></button>
    <select class="form-control" name="gn">
    <option value="female">Female</option>
    <option value="male">male</option>
    </select>
    </div>
                                <label for="">DOB</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-face-smile text-white"></i></button>
                                    <input type="date" class="form-control" placeholder="Age"
                                        aria-label="name" name="dob" required>
                                </div>
                                <label for="">Usertype</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-angle-up text-white"></i></button>
                                    <select class="form-control" id="utp" name="ut">
                                        <option value="super">Super Admin</option>
                                        <option value="man">Campus Manager</option>
                                        <option value="rep">Rep/Vendors</option>
                                    </select>
                                </div>
                                <script>
                $(document).ready(function() {
                  $('#utp').on("change", function(){
                    var ut = $(this).val();
                    $.ajax({
                      url:"ajax_post/usertype.php",
                      method:"POST",
                      data:{ut:ut},
                      success:function(data){
                        $('#make_display').html(data);
                      }
                    })
                  });
                  $('#uxu').on("change keyup paste click", function(){
                    var username = $(this).val();
                    var email = $('#emj').val();
                    $.ajax({
                      url:"ajax_post/username.php",
                      method:"POST",
                      data:{username:username, email:email},
                      success:function(data){
                        $('#make_user').html(data);
                      }
                    })
                  });
                  $('#emj').on("change keyup paste click", function(){
                    var username = $(this).val();
                    var email = $('#emj').val();
                    $.ajax({
                      url:"ajax_post/username.php",
                      method:"POST",
                      data:{username:username, email:email},
                      success:function(data){
                        $('#make_user').html(data);
                      }
                    })
                  });
                });
              </script>
                                <div id="make_display"></div>
                                <label for="">Country</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-map text-white"></i></button>
                                    <select class="form-control" name="u_country">
                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                <option value="Ã…land Islands">Ã…land Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <!-- <option value="Nigeria">Nigeria</option> -->
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <label for="">Profile Picture</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-import text-white"></i></button>
                                    <div class="custom-file">
                                        <input type="file" name="chooseFile" class="custom-file-input" id="inputGroupFile01" accept="image/*" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                    </div>
                                </div>
                                <label for="">Phone</label>
    <div class="input-group mb-3">
        <button type="button" class="btn btn-info"><i
        class="ti-more text-white"></i></button>
        <input type="text" class="form-control" placeholder="Enter Mobile Number Here"
        aria-label="no" name="ph" required>
    </div>
    <div id="make_user"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- institution -->
            <div class="modal fade" id="createmodelint" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="../function/create_int.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Create
                                    New Institution</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-home text-white"></i></button>
                                    <input type="text" class="form-control" name="int_name" placeholder="Enter Int. Name Here"
                                        aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-map-alt text-white"></i></button>
                                    <input type="text" class="form-control" name="int_city" placeholder="Enter City Here"
                                        aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-location-pin text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="State"
                                        aria-label="name" name="int_state">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-map text-white"></i></button>
                                    <select class="form-control" name="int_country">
                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                <option value="Ã…land Islands">Ã…land Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <!-- <option value="Nigeria">Nigeria</option> -->
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-more text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Zip Code"
                                        aria-label="no" name="int_zip">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php
include("footer.php");
?>