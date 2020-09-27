<?php
$web_title = "Payroll Management";
include("header.php");
?>
   <!-- ============================================================== -->
   <div class="page-content container-fluid">
       <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $n_man_per = $_POST["man_per_in"];
             $n_rep_per = $_POST["rep_per_in"];
            //  make super admin earning
            $super_per_1 = $n_man_per + $n_rep_per;
            $super_per = 100 - $super_per_1;
            if ($super_per > 0 && $usertype == "super") {
                $query_super1 = mysqli_query($connection, "SELECT * FROM `payroll_management`");
            if (mysqli_num_rows($query_super1) < 1) {
                $date = date('Y-m-d');
                $query_in = mysqli_query($connection, "INSERT INTO `payroll_management` (`rep_per`, `man_per`, `date`) VALUES ('{$n_rep_per}', '{$n_man_per}', '{$date}')");
                if ($query_in) {
                    echo '<script type="text/javascript">
                    $(document).ready(function(){
                        Swal.fire({
                            type: "success",
                            title: "Payroll Update",
                            text: "You Have Updated Successfully ",
                            showConfirmButton: false,
                            timer: 5000
                        })
                    });
                    </script>
                    ';
                } else {
                    echo '<script type="text/javascript">
                    $(document).ready(function(){
                        Swal.fire({
                            type: "error",
                            title: "System Error While Inserting",
                            text: "You Have Have an Error",
                            showConfirmButton: false,
                            timer: 5000
                        })
                    });
                    </script>
                    ';
                }
            } else {
                $query_update = mysqli_query($connection, "UPDATE `payroll_management` SET rep_per = '$n_rep_per', man_per = '$n_man_per'");
                if ($query_update) {
                    echo '<script type="text/javascript">
                    $(document).ready(function(){
                        Swal.fire({
                            type: "success",
                            title: "Payroll Update",
                            text: "You Have Updated Successfully ",
                            showConfirmButton: false,
                            timer: 5000
                        })
                    });
                    </script>
                    ';
                } else {
                    echo '<script type="text/javascript">
                    $(document).ready(function(){
                        Swal.fire({
                            type: "error",
                            title: "System Error While Inserting",
                            text: "You Have Have an Error",
                            showConfirmButton: false,
                            timer: 5000
                        })
                    });
                    </script>
                    ';
                }
            }
            } else {
                echo '<script type="text/javascript">
                $(document).ready(function(){
                    Swal.fire({
                        type: "error",
                        title: "System Error While Inserting",
                        text: "Please Check the percentage and only super admin are authorized to change",
                        showConfirmButton: false,
                        timer: 5000
                    })
                });
                </script>
                ';
            }
            
         }
       ?>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <?php
                $query_super = mysqli_query($connection, "SELECT * FROM `payroll_management` ORDER BY id ASC LIMIT 1");
                if (mysqli_num_rows($query_super) > 0) {
                    $ds = mysqli_fetch_array($query_super);
                $rep_per = $ds["rep_per"];
                $man_per = $ds["man_per"];
                } else {
                    $rep_per = 50;
                    $man_per = 10;
                }
                ?>
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h5 class="card-title">Update the Payroll - Customizable Percentage</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Managers Percentage</label>
                                                    <input type="decimal" class="form-control"  value="<?php echo $man_per; ?>" name="man_per_in" placeholder="" required>
                                                 </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Rep Percentage</label>
                                                    <input type="decimal" name="rep_per_in" value="<?php echo $rep_per; ?>" class="form-control" placeholder="" required> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <!--/row-->
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Blog Content Type</label>
                                                    <select class="form-control" name="type" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="Image">Image</option>
                                                        <option value="Video">Video</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Blog Tag*</label>
                                                    <input type="text" id="req" name="tag" class="form-control" placeholder="Enter a Tag eg. Business, Finance " required> </div>
                                            </div>
                                        </div> -->
                                        <!--/row-->
                                        <hr> </div>
                                    <div class="form-actions mt-5">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update Payroll</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php
include("footer.php");
?>