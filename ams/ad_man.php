<?php
$web_title = "Manage Institution Ad";
include("header.php");
?>
<!-- check -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                            $sql1 = mysqli_query($connection,"SELECT * FROM `man_approval` WHERE int_id = '$int_id'");
                                            $q1 = mysqli_num_rows($sql1);
                                            $sql2 = mysqli_query($connection,"SELECT * FROM `client_post`");
                                            $q2 = mysqli_num_rows($sql2);
                                            ?>
                                            <div class="col pr-0">
                                                <h1 class="font-light"><?php echo $q1; ?>/<?php echo $q2; ?></h1>
                                                <h6 class="text-muted">Total Approved/Total Ads</h6></div>
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
                                             $sql1 = mysqli_query($connection,"SELECT SUM(debit) AS debit FROM ad_transaction WHERE int_id = '$int_id' AND (transaction_type = 'rep debit' OR transaction_type = 'man debit')");
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
                $result = mysqli_query($connection, "SELECT `client_post`.* FROM `client_post` INNER JOIN adu_post ON `client_post`.`id` = adu_post.post_id WHERE (end_date > '$gen_date' OR end_date = '$gen_date') AND (adu_post.int_id = '$int_id' OR adu_post.int_id = '0') ORDER BY id DESC");
                ?>
                <div class="row el-element-overlay">
                <?php if (mysqli_num_rows($result) > 0) {
                $rows = 0;
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                            <?php
                            $image = $row["img"];
                            $image_length = strlen($image);
                            if ($image_length > 10 && $image_length > 11 ) {
                                $image = $image;
                            } else {
                                $image = "https://cdn.pixabay.com/photo/2018/02/15/16/22/puzzle-3155663_960_720.png";
                            }
                            ?>
                                <div class="el-card-avatar el-overlay-1"> <img src="ad_img/<?php echo $image; ?>" alt="user" />
                                <?php
                                ?>
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
                                        $a_s = $row["post_link"];
                                        $select_man = mysqli_query($connection, "SELECT * FROM `man_approval` WHERE post_link = '$a_s' AND int_id = '$int_id'");
                                        $xm = mysqli_num_rows($select_man);
                                        if ($xm <= "0") {
                                            $ap_stat = "Pending Approval";
                                            $action = "Approve Client Ad";
                                            $color = "warning";
                                        } else if ($xm >= 1) {
                                            $ap_stat = "Active";
                                            $color = "success";
                                            $action = "Review Client Ad";
                                        }
                                        ?>
                                        <span class="text-muted"><?php echo $row["ad_sub_head"]; ?> | status: <?php echo $ap_stat; ?></span>
                                    </div>
                                    <div class="ml-auto mr-3">
                                        <button type="button" class="btn btn-<?php echo $color ?> btn-circle">&#8358;</button>
                                    </div>
                                    <!-- MOVE -->
                                </div>
                                    <center>
                                    <?php 
                                    $head = $row["ad_head"];
                                    $sub_head = $row["ad_sub_head"]; ?>
<?php $body = $row["short_description"]; ?>
<?php $link = 'https://thisistera.com/ads/ad.php?no='.$row["post_link"];?>
<span>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<a class="fa fa-facebook fb-share-button" style="color: #008080; font-size: 30px;" data-href="<?php echo $link.'&harsh='.$user_id; ?>" 
data-layout="button_count"></a>
<a href="https://twitter.com/home?status=<?php echo $link.'&harsh='.$user_id; ?> <?php echo $head." \n".$sub_head." \n".$body."\n";?>" class="fa fa-twitter" style="color: #008080; font-size: 30px; padding: 20px;
  width: 50px;
  text-align: center;
  text-decoration: none;"></a>
<a href="mailto:name@yourmail.com?&subject=<?php echo $head; ?>&body=<?php echo $link.'&harsh='.$user_id;?> Click Me! <?php echo $sub_head." ".$body;?>" class="fa fa-google" style="color: #008080; padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;"></a>
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link.'&harsh='.$user_id; ?>&title=<?php echo $head; ?>&summary=<?php echo $sub_head." ".$body;?>&source=" class="fa fa-linkedin" style="color: #008080; padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;"></a>
  <!-- script -->
  <script>
      $(document).ready(function() {
        var isMobile = {
Android: function() {
return navigator.userAgent.match(/Android/i);
},
BlackBerry: function() {
return navigator.userAgent.match(/BlackBerry/i);
},
iOS: function() {
return navigator.userAgent.match(/iPhone|iPad|iPod/i);
},
Opera: function() {
return navigator.userAgent.match(/Opera Mini/i);
},
Windows: function() {
return navigator.userAgent.match(/IEMobile/i);
},
any: function() {
return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
}
};
$(document).on("click", '.whatsapp', function() {
if( isMobile.any() ) {
var text = $(this).attr("data-text");
var url = $(this).attr("data-link");
var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
var whatsapp_url = "whatsapp://send?text=" + message;
window.location.href = whatsapp_url;
} else {
Swal.fire({
            type: "error",
            title: "Mobile Whatsapp Share",
            text: "Please share this article in mobile device",
            showConfirmButton: false,
            timer: 2000
        })
}
});
});
  </script>
<a class="fa fa-whatsapp whatsapp" style="color: #008080; padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;" data-text="<?php echo $head." \n".$sub_head." \n".$body."\n";?>" data-link="<?php echo $link.'&harsh='.$user_id; ?>" ></a>
<p>COPY LINK BELOW</p>
<input class="form-control form-control-lg" id="myInput" value="<?php echo $link.'&harsh='.$user_id;?>">
<a id="download" class="btn btn-warning" href="ad_img/<?php echo $row["img"]; ?>" download="ad_img/<?php echo $row["img"]; ?>">Download Ad Image</a> 
</span>

                                      <a class="btn btn-<?php echo $color; ?>" href="single_man.php?no=<?php echo $row["post_link"]; ?>"><?php echo $action; ?></a> 
                                      <a class="btn btn-danger" href="../function/disapprove_ad.php?del=<?php echo $row["id"]; ?>">Disapprove Ad</a> 
                                    </center>
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