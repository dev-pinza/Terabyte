<?php
$web_title = "Share Ads";
include("header.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- qrtpo -->
      <!-- Container fluid  -->
      <?php
            // get the in ids
            if ($usertype == "rep") {
                $query_us = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user_id'");
                $qu = mysqli_fetch_array($query_us);
                $is_dis = $qu["is_disabled"];
                $int_id = $qu["int_id"];
                $gen_date = date('Y-m-d');
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
                                                $client_q = mysqli_query($connection, "SELECT * FROM `ad_transaction` WHERE user_id = '$user_id' AND transaction_type = 'rep debit'");
                                                $no_client = mysqli_num_rows($client_q);
                                                ?>
                                                <h1 class="font-light"><?php echo $no_client; ?></h1>
                                                <h6 class="text-muted">Total Shared</h6></div>
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
                                            $sql2 = mysqli_query($connection,"SELECT * FROM `client_post` WHERE end_date >= $gen_date");
                                            $q2 = mysqli_num_rows($sql2);
                                            ?>
                                            <div class="col pr-0">
                                                <h1 class="font-light"><?php echo $q2; ?></h1>
                                                <h6 class="text-muted">Total Approved Ad</h6></div>
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
                $result = mysqli_query($connection, "SELECT client_post.`post_link`, client_post.`ad_head`, client_post.`ad_sub_head`, client_post.`short_description`, client_post.`img`, client_post.`approval_status`, client_post.`fire_link` FROM client_post INNER JOIN man_approval ON client_post.`post_link`= man_approval.post_link INNER JOIN adu_post ON `client_post`.`id` = adu_post.post_id WHERE man_approval.int_id = '$int_id' AND (client_post.end_date > '$gen_date' OR client_post.end_date = '$gen_date') AND (adu_post.int_id = '$int_id' OR adu_post.int_id = '0') ORDER BY client_post.id DESC");
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
                                            $color = "warning";
                                        } else if ($xm >= 1) {
                                            $ap_stat = "Active";
                                            $color = "success";
                                        }
                                        ?>
                                        <span class="text-muted"><?php echo $row["ad_sub_head"]; ?> | status: <?php echo $ap_stat; ?></span>
                                        <br>
                                        <p>SHARE AD LINK</p>
                                        <?php $head = $row["ad_head"]; ?>
<?php $sub_head = $row["ad_sub_head"]; ?>
<?php $body = $row["short_description"]; ?>
<?php $link = 'https://thisistera.com/ads/ad.php?no='.$row["post_link"].'&harsh='.$user_id.'';?>
                                        <span>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<a class="fa fa-facebook fb-share-button" style="color: #008080; font-size: 30px;" data-href="<?php echo $link; ?>" 
data-layout="button_count"></a>
<a href="https://twitter.com/home?status=<?php echo $link; ?> <?php echo $head." \n".$sub_head." \n".$body."\n";?>" class="fa fa-twitter" style="color: #008080; font-size: 30px; padding: 20px;
  width: 50px;
  text-align: center;
  text-decoration: none;"></a>
<a href="mailto:name@yourmail.com?&subject=<?php echo $head; ?>&body=https://pinzastudio.com Click Me! <?php echo $sub_head." ".$body;?>" class="fa fa-google" style="color: #008080; padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;"></a>
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link; ?>&title=<?php echo $head; ?>&summary=<?php echo $sub_head." ".$body;?>&source=" class="fa fa-linkedin" style="color: #008080; padding: 20px;
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
  text-decoration: none;" data-text="<?php echo $head." \n".$sub_head." \n".$body."\n";?>" data-link="<?php echo $link; ?>" ></a>
<!-- <a href="#" class="fa fa-instagram" style="color: #008080; padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;"></a> -->
<!-- <a href="#" class="fa fa-skype" style="color: #008080; padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;"></a> -->
  <p>COPY LINK BELOW</p>
<input class="form-control form-control-lg" id="myInput" value="<?php echo $link;?>">
<br>
<center>
<a id="download" class="btn btn-warning" href="ad_img/<?php echo $row["img"]; ?>" download="ad_img/<?php echo $row["img"]; ?>">Download Ad Image</a> 
</center>


<!-- finsh -->
                                        </span>
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
                                        <a href="#" class="btn btn-dark">No Promotion Currently</a>
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
<!-- ed it  -->
<?php
            }
include("footer.php");
?>