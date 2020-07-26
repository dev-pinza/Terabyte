<?php
$web_title = "Manage Institution Ad";
include("header.php");
?>
<!-- check -->
<!-- ============================================================== -->
            <!-- Container fluid  -->
            <?php
            // get the in ids
            if ($usertype == "man") {
                $query_us = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user_id'");
                $qu = mysqli_fetch_array($query_us);
                $is_dis = $qu["is_disabled"];
                $int_id = $qu["int_id"];
                if ($is_dis == "0") {
            ?>
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-3">Total Ad Summary</h4>
                        <!-- row -->
                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row pt-2 pb-2">
                                            <!-- Column -->
                                            <div class="col pr-0">
                                                <?php
                                                $client_q = mysqli_query($connection, "SELECT * FROM `man_approval` WHERE int_id = '$int_id'");
                                                $no_client = mysqli_num_rows($client_q);
                                                ?>
                                                <h1 class="font-light"><?php echo $no_client; ?></h1>
                                                <h6 class="text-muted">Total Client</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="20%" class="css-bar mb-0 css-bar-primary css-bar-100"><i class="mdi mdi-account-circle"></i></div>
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
                                            $sql1 = mysqli_query($connection,"SELECT * FROM `client_post` WHERE approval_status = '1'");
                                            $q1 = mysqli_num_rows($sql1);
                                            $sql2 = mysqli_query($connection,"SELECT * FROM `client_post` WHERE approval_status = '0'");
                                            $q2 = mysqli_num_rows($sql2);
                                            ?>
                                            <div class="col pr-0">
                                                <h1 class="font-light"><?php echo $q1; ?>/<?php echo $q2; ?></h1>
                                                <h6 class="text-muted">Approved/Pending Ads</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="30%" class="css-bar mb-0 css-bar-danger css-bar-100"><i class="mdi mdi-briefcase-check"></i></div>
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
                                             $sql1 = mysqli_query($connection,"SELECT * FROM `account` WHERE user_id = '$user_id'");
                                             $q1 = mysqli_fetch_array($sql1);
                                             $reach = number_format($q1["balance_derived"], 2);
                                            ?>
                                            <div class="col pr-0">
                                                <h1 class="font-light">&#8358; <?php echo $reach; ?></h1>
                                                <h6 class="text-muted">Your Total Earning</h6></div>
                                            <!-- Column -->
                                            <!-- <div class="col text-right align-self-center">
                                                <div data-label="100%" class="css-bar mb-0 css-bar-warning css-bar-100"><i class="mdi mdi-star-circle"></i></div>
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
                                             $sql1 = mysqli_query($connection,"SELECT SUM(debit) AS debit FROM ad_transaction WHERE int_id = '$int_id'");
                                             $q1 = mysqli_fetch_array($sql1);
                                             $reachx = number_format($q1["debit"], 2);
                                            ?>
                                            <div class="col pr-0">
                                                <h1 class="font-light">&#8358; <?php echo $reachx; ?></h1>
                                                <h6 class="text-muted">Total Institution Income</h6></div>
                                            <!-- Column -->
                                            <!-- <div class="col text-right align-self-center">
                                                <div data-label="100%" class="css-bar mb-0 css-bar-info css-bar-100"><i class="mdi mdi-receipt"></i></div>
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
                $result = mysqli_query($connection, "SELECT * FROM `client_post` WHERE end_date > '$gen_date' OR end_date = '$gen_date' ORDER BY id DESC");
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
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="single_man.php?no=<?php echo $row["post_link"]; ?>"><i class="icon-magnifier"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="https://thisistera.com/ads/ad.php?no=<?php echo $row["post_link"];?>&harsh=<?php echo $user_id; ?>"><i class="icon-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex no-block align-items-center">
                                    <div class="ml-3">
                                        <h4 class="mb-0"><?php echo $row["ad_head"]; ?></h4>
                                        <?php
                                        $a_s = $row["approval_status"];
                                        if ($a_s == "0") {
                                            $ap_stat = "Pending Approval";
                                            $color = "warning";
                                        } else {
                                            $ap_stat = "Active";
                                            $color = "success";
                                        }
                                        ?>
                                        <span class="text-muted"><?php echo $row["ad_sub_head"]; ?> | status: <?php echo $ap_stat; ?></span>
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
                } else  {
                ?>
                <h1>YOU HAVE BEEN RESTRICTED</h1>
                <?php
            }
            ?>
<?php
}
include("footer.php");
?>