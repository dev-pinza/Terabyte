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
                if(isset($_GET["no"])) {
                    $post_id = $_GET["no"];
                    $person = mysqli_query($connection, "SELECT * FROM `client_post` WHERE post_link = '$post_id' AND client_id = '$user_id'");
                    $n = mysqli_fetch_array($person);
                    // display result
                    $lunch_date  = $n["lunch_date"];
                    $fire_link = $n["fire_link"];
                    $destination = $n["destination"];
                    $ad_category = $n["ad_category"];
                    $head = $n["ad_head"];
                    $title = $n["ad_sub_head"];
                    $body = $n["short_description"];
                    $aud_name = $n["aud_name"];
                    $age_gend = $n["age_gend"];
                    $img = $n["img"];
                    $end_date = $n["end_date"];
                ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $head; ?></h3>
                                <!-- <h6 class="card-subtitle">globe type chair for rest</h6> -->
                                <div class="row">
                                    <!-- <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="white-box text-center"> <img src="ad_img/<?php echo $img; ?>" class="img-responsive" height="400px" width="400px"/> </div>
                                    </div> -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h3 class="box-title mt-5">General Info</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td width="390">Brand</td>
                                                        <td> Stellar </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Condition</td>
                                                        <td> Knock Down </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Seat Lock Included</td>
                                                        <td> Yes </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Type</td>
                                                        <td> Office Chair </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Style</td>
                                                        <td> Contemporary &amp; Modern </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wheels Included</td>
                                                        <td> Yes </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Upholstery Included</td>
                                                        <td> Yes </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Upholstery Type</td>
                                                        <td> Cushion </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Head Support</td>
                                                        <td> No </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Suitable For</td>
                                                        <td> Study &amp; Home Office </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Adjustable Height</td>
                                                        <td> Yes </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Model Number</td>
                                                        <td> F01020701-00HT744A06 </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Armrest Included</td>
                                                        <td> Yes </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Care Instructions</td>
                                                        <td> Handle With Care, Keep In Dry Place, Do Not Apply Any Chemical For Cleaning. </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Finish Type</td>
                                                        <td> Matte </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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