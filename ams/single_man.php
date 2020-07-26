<?php
$web_title = "Ad Details";
include("header.php");
?>
 <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <?php
                if(isset($_GET["no"]) && $usertype = "man") {
                    $post_id = $_GET["no"];
                    $person = mysqli_query($connection, "SELECT * FROM `client_post` WHERE post_link = '$post_id'");
                    $n = mysqli_fetch_array($person);
                    // display result
                    $pid = $n["id"];
                    $lunch_date  = $n["lunch_date"];
                    $fire_link = $n["fire_link"];
                    $dest = $n["destination"];
                    $client_id = $n["client_id"];
                    if ($dest == "1") {
                        $dest = "Social Media (Whatsapp, Instagram, Facebook, +3 others)";
                    } else if ($dest == "2") {
                        $dest = "Website & Blog";
                    } else if ($dest == "3") {
                        $dest = "Instance Message";
                    } else if ($dest == "4") {
                        $dest = "Payment Page";
                    }
                    $ad_c = $n["ad_category"];
                    if ($ad_c == "1") {
                        $ad_c = "Finance & Investment";
                    } else if ($ad_c == "2") {
                        $ad_c = "Transportation";
                    } else if ($ad_c == "3") {
                        $ad_c = "Software/Computer & Eletronic Gadget";
                    } else if ($ad_c == "4") {
                        $ad_c = "E-commerce";
                    } else if ($ad_c == "5") {
                        $ad_c = "Education";
                    } else if ($ad_c == "6") {
                        $ad_c = "Health/Skin Care & Pharmacecutical";
                    } else if ($ad_c == "7") {
                        $ad_c = "Food & Agriculture";
                    } else if ($ad_c == "8") {
                        $ad_c = "Entertainment & Music";
                    } else if ($ad_c == "9") {
                        $ad_c = "News & Media";
                    } else if ($ad_c == "10") {
                        $ad_c = "Manufacturing";
                    } else if ($ad_c == "11") {
                        $ad_c = "Energy and Power";
                    } else if ($ad_c == "12") {
                        $ad_c = "Mining";
                    }
                    $head = $n["ad_head"];
                    $title = $n["ad_sub_head"];
                    $body = $n["short_description"];
                    $aud_name = $n["aud_name"];
                    $age_gend = $n["age_gend"];
                    if ($age_gend == "0") {
                        $age_gend = "All";
                    } else if ($age_gend == "1") {
                        $age_gend = "All Gender and 18+";
                    } else if ($age_gend = "2") {
                        $age_gend = "Male only and 18+";
                    } else if ($age_gend = "3") {
                        $age_gend = "Female only and 18+";
                    } else if ($age_gend = "4") {
                        $age_gend = "Others";
                    }
                    $img = $n["img"];
                    $end_date = $n["end_date"];
                    $auto = $n["auto_renew"];
                    $app_status = $n["approval_status"];
                    if ($auto == "1") {
                        $auto = "Yes";
                    } else {
                        $auto = "No";
                    }
                ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                <h1 class="card-title"><?php echo $head; ?></h1>
                                <h3 class="card-subtitle"><?php echo $title;?></h3>
                                <h6 class="card-subtitle"><?php echo $body; ?></h6>
                                </center>
                                <div class="row">
                                    <!-- <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="white-box text-center"> <img src="ad_img/<?php echo $img; ?>" class="img-responsive" height="400px" width="400px"/> </div>
                                    </div> -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h3 class="box-title mt-5">Ad Description</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td width="390">Destination</td>
                                                        <td> <?php echo $dest; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ad Category</td>
                                                        <td> <?php echo $ad_c; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Audience Name</td>
                                                        <td> <?php echo $aud_name; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Age and Gender</td>
                                                        <td> <?php echo $age_gend; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>End Date</td>
                                                        <td> <?php echo $end_date; ?> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- make it hit -->
                                    <?php
                                    $person = mysqli_query($connection, "SELECT * FROM `ad_promotion` WHERE post_id = '$pid' AND client_id = '$client_id'");
                                    $n = mysqli_fetch_array($person);

                                    ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h3 class="box-title mt-5">Ad Promotion Insight</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td width="390">Reach/Est. Reach</td>
                                                        <td> <?php echo $n["aud_reach"]."/".$n["est_reach"]; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Click/Est. Click</td>
                                                        <td> <?php echo $n["tot_click"]."/".$n["est_click"]; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Impression/Est. Impression</td>
                                                        <td> <?php echo $n["tot_con"]."/".$n["est_con"]; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shared</td>
                                                        <td> <?php echo $n["shared"]; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Budget Amount</td>
                                                        <td> NGN <?php echo number_format($n["budget_amount"], 2); ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ad Status</td>
                                                        <td> <?php echo $n["payment_status"]; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Created Date</td>
                                                        <td> <?php echo $n["created_date"]; ?> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                                <?php
                                    if ($app_status != "1") {
                                        ?>
                                <center>
                                <a class="btn btn-success text-white float-right ml-3 d-none d-md-block" href="approve.php?no=<?php echo $post_id; ?>">Approve Promotion</a>
                                </center>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <h1>404 ERROR</h1>
                    <?php
                }
                   ?>
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
<?php
include("footer.php");
?>