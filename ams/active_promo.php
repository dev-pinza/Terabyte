<?php
$web_title = "Manage Promotion";
include("header.php");
?>
<!-- check -->
<!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-3">Total Active Ad Summary</h4>
                        <!-- row -->
                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row pt-2 pb-2">
                                            <!-- Column -->
                                            <?php
                                            $sql1 = mysqli_query($connection,"SELECT SUM(aud_reach) AS reach FROM ad_promotion WHERE client_id = '$user_id'");
                                            $q1 = mysqli_fetch_array($sql1);
                                            $reach = number_format($q1["reach"]);
                                            $sql2 = mysqli_query($connection,"SELECT SUM(est_reach) AS est_reach FROM ad_promotion WHERE client_id = '$user_id'");
                                            $q2 = mysqli_fetch_array($sql2);
                                            $est_reach = number_format($q2["est_reach"]);
                                            $per_one = floor((($q1["reach"] / $q2["est_reach"]) * 100));
                                            $per_one1 = (string)$per_one;
                                            $per_one = substr($per_one1, 0, 1)."0";
                                            $length = strlen($per_one1);
                                            if ($length > 2) {
                                                $per_one = substr($per_one1, 0, 1)."00";
                                            }
                                            ?>
                                            <div class="col pr-0">
                                                <h1 class="font-light"><?php echo $reach."/".$est_reach; ?></h1>
                                                <h6 class="text-muted">Total Audience Reached</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $per_one; ?>%" class="css-bar mb-0 css-bar-primary css-bar-<?php echo $per_one;?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row pt-2 pb-2">
                                            <!-- Column -->
                                            <?php
                                            $sql1 = mysqli_query($connection,"SELECT * FROM `client_post` WHERE client_id = '$user_id' AND approval_status = '1'");
                                            $q1 = mysqli_num_rows($sql1);
                                            $sql2 = mysqli_query($connection,"SELECT * FROM `client_post` WHERE client_id = '$user_id'");
                                            $q2 = mysqli_num_rows($sql2);
                                            $per_one = floor((($q1 / $q2) * 100));
                                            $per_one1 = (string)$per_one;
                                            $per_one = substr($per_one1, 0, 1)."0";
                                            $length = strlen($per_one1);
                                            if ($length > 2) {
                                                $per_one = substr($per_one1, 0, 1)."00";
                                            }
                                            ?>
                                            <div class="col pr-0">
                                                <h1 class="font-light"><?php echo $q1."/".$q2; ?></h1>
                                                <h6 class="text-muted">Total Active Ads</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="30%" class="css-bar mb-0 css-bar-danger css-bar-<?php echo $per_one; ?>"><i class="mdi mdi-briefcase-check"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row pt-2 pb-2">
                                            <!-- Column -->
                                            <?php
                                            $sql1 = mysqli_query($connection,"SELECT SUM(budget_amount) AS budget_amount FROM ad_promotion WHERE client_id = '$user_id'");
                                            $q1 = mysqli_fetch_array($sql1);
                                            $credit = number_format($q1["budget_amount"], 2);
                                            ?>
                                            <div class="col pr-0">
                                                <h1 class="font-light">&#8358; <?php echo $credit; ?></h1>
                                                <h6 class="text-muted">Total Ad Deposit</h6></div>
                                            <!-- Column -->
                                            <!-- <div class="col text-right align-self-center">
                                                <div data-label="40%" class="css-bar mb-0 css-bar-warning css-bar-40"><i class="mdi mdi-star-circle"></i></div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row pt-2 pb-2">
                                            <!-- Column -->
                                            <?php
                                            $sql1 = mysqli_query($connection,"SELECT SUM(used_amount) AS used_amount FROM ad_promotion WHERE client_id = '$user_id'");
                                            $q1 = mysqli_fetch_array($sql1);
                                            $debit = number_format($q1["used_amount"], 2);
                                            ?>
                                            <div class="col pr-0">
                                                <h1 class="font-light">&#8358; <?php echo $debit; ?><?php ?></h1>
                                                <h6 class="text-muted">Total Cash Spent</h6></div>
                                            <!-- Column -->
                                            <!-- <div class="col text-right align-self-center">
                                                <div data-label="60%" class="css-bar mb-0 css-bar-info css-bar-60"><i class="mdi mdi-receipt"></i></div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>
                    </div>
                    <!-- row -->
                </div>

                <!-- CHECK PRODUCT -->
                <?php
                $gen_date = date('Y-m-d');
                $result = mysqli_query($connection, "SELECT * FROM `client_post` WHERE (client_id = '$user_id') AND (end_date > '$gen_date' OR end_date = '$gen_date') ORDER BY id DESC");
                ?>
                <div class="row el-element-overlay">
                <?php if (mysqli_num_rows($result) > 0) {
                $rows = 0;
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="ad_img/<?php echo $row["img"]; ?>" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="single_ad.php?no=<?php echo $row["post_link"]; ?>"><i class="icon-magnifier"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://thisistera.com/ads/ad.php?no=<?php echo $row["post_link"]; ?>&harsh=<?php echo "0"; ?>"><i class="icon-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex no-block align-items-center">
                                    <div class="ml-3">
                                        <h4 class="mb-0"><?php echo $row["ad_head"]; ?></h4>
                                        <?php
                                        $a_s = $row["approval_status"];
                                        $post_link = $row["post_link"];
                                        $query_approed = mysqli_query($connection, "SELECT * FROM `man_approval` WHERE post_link = '$post_link'");
                                        $get_feedback = mysqli_num_rows($query_approed);
                                        // get the approve post
                                        if ($get_feedback < 0) {
                                            $ap_stat = "Pending Approval";
                                            $color = "warning";
                                        } else {
                                            $ap_stat = "Active";
                                            $color = "success";
                                        }
                                        ?>
                                        <span class="text-muted"><?php echo $row["ad_sub_head"]; ?> | status: <?php echo $ap_stat; ?></span>
                                        <center>
                                      <a class="btn btn-primary" href="update_promotion.php#" style="color: white;">Edit Ad</a>
                                      <a class="btn btn-danger" href="../function/delete_ad.php?del=<?php echo $row["id"]; ?>" style="color: white;">Stop Ad</a>
                                    </center>
                                    </div>
                                    <div class="ml-auto mr-3">
                                        <button type="button" class="btn btn-<?php echo $color ?> btn-circle">&#8358;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
             }
             else {
               ?>
               <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="el-card-item">
                                <div>
                                    <center>
                                    <div class="">
                                        <a href="create_promotion.php" class="btn btn-dark">Create Promotion</a>
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php
             }
            ?>
                </div>
                <!-- END -->
            </div>
<?php
include("footer.php");
?>