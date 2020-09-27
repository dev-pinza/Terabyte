<?php
$web_title = "Manage Blog";
include("header.php");
?>
<!-- Container fluid  -->
<?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $title = preg_replace('/[^\w]/', ' ', $_POST["title"]);
                    $sub_title = preg_replace('/[^\w]/', ' ', $_POST["sub_title"]);
                    $type = preg_replace('/[^\w]/', ' ', $_POST["type"]);
                    $tag = preg_replace('/[^\w]/', ' ', $_POST["tag"]);
                    $body = preg_replace('/[^\w]/', ' ', $_POST["body"]);
                    $date = date('Y-m-d');
                    $link = $_POST["link"];
                    // check if exist
                    $check = mysqli_query($connection, "SELECT * FROM blog_post WHERE title = '$title' AND sub_title = '$sub_title'");
                    if (mysqli_num_rows($check) <= 0) {
                        // uplaod visual
                        $temp1 = explode(".", $_FILES['chooseFile']['name']);
                        $digits = 10;
                        $randms1 = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                        $sig_passport_one = $randms1. '.' .end($temp1);
                        if (move_uploaded_file($_FILES['chooseFile']['tmp_name'], "blog_post/" . $sig_passport_one)) {
                        $msg = "101";
                        } else {
                          $msg = "200";
                        }
                        // make upload
                        if ($msg == "101") {
                            $upload_int = mysqli_query($connection, "INSERT INTO `blog_post` (`user_id`, `date`, `title`, `sub_title`, `body`, `visual`, `type`, `tag`, `link`) VALUES ('{$user_id}', '{$date}', '{$title}', '{$sub_title}', '{$body}', '{$sig_passport_one}', '{$type}', '{$tag}', '{$link}')");
                            if ($upload_int) {
                                echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "success",
            title: "Blog Post Created",
            text: "You Have Successfully Created "'.$title.'" ",
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
            title: "System Error",
            text: "Error Creating "'.$title.'" ",
            showConfirmButton: false,
            timer: 5000
        })
    });
    </script>
    ';
                            }
                        } else {
                            echo '<script type="text/javascript">
$(document).ready(function(){
    Swal.fire({
        type: "error",
        title: "File Upload Failed",
        text: "Please Check The File",
        showConfirmButton: false,
        timer: 7000
    })
});
</script>
';
                        }
                    } else {
                        echo '<script type="text/javascript">
$(document).ready(function(){
    Swal.fire({
        type: "error",
        title: "Blog Post Exist",
        text: "This Blog is Already Posted on the System",
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
            <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h5 class="card-title">Fill The Blog Form Properly</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" id="title" class="form-control" name="title" placeholder="Enter a Title eg. Hello" required> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Sub-Title</label>
                                                    <input type="text" id="sub_title" name="sub_title" class="form-control" placeholder="Enter a Sub-Title eg. Learning Languages" required> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <!--/row-->
                                        <div class="row">
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
                                            <!--/span-->
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <h5 class="card-title mt-5">Blog Content</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="body" class="form-control" rows="4">..Content...</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="card-title mt-3">Upload Image (Please use Image Size 770 PX WIDTH - 444 PX HEIGHT )</h5>
                                                <div class="el-element-overlay">
                                                    <div class="el-card-item">
                                                        <div class="el-card-avatar el-overlay-1">
                                                            <div class="el-overlay">
                                                                <ul class="list-style-none el-info">
                                                                    <!-- <li class="el-item"></li> -->
                                                                    <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn btn-info waves-effect waves-light"><span>Select Image</span>
                                                    <input type="file" class="upload" name="chooseFile" accept="image/*"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Video Link (IF CONTENT TYPE IS VIDEO)</label>
                                                    <input type="url" id="sub_title" name="link" class="form-control" placeholder="Enter a Video Link(https://videolink.com" required> </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <hr> </div>
                                    <div class="form-actions mt-5">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Post</button>
                                        <button type="button" class="btn btn-dark">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="material-card card">
                            <div class="card-body">
                                <h4 class="card-title">Created Institution</h4>
                                <h6 class="card-subtitle">Modify the institution</h6>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped border">
                                        <thead>
                                        <?php
                        $query1 = "SELECT * FROM `blog_post`";
                        $result1 = mysqli_query($connection, $query1);
                      ?>
                                            <tr>
                                                <th>Title</th>
                                                <th>Tag</th>
                                                <th>File Type</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Modify</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {?>
                                            <tr>
                                                <td><?php echo $row1["title"]; ?> - <?php echo $row1["sub_title"]; ?></td>
                                                <td><?php echo $row1["tag"]; ?></td>
                                                <td><?php echo $row1["type"]; ?></td>
                                                <td><?php echo $row1["date"]; ?></td>
                                                <?php
                                                $b_uid = $row1["user_id"];
                                                $query_n = mysqli_query($connection, "SELECT * FROM users WHERE id = '$b_uid'");
                                                $n = mysqli_fetch_array($query_n);
                                                $b_full = $n["fullname"];
                                                ?>
                                                <td><?php echo $b_full; ?></td>
                                                <td> <button class="btn btn-success">update</button> </td>
                                                <td> <button class="btn btn-danger">delete</button> </td>
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