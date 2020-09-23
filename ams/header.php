<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <title>Terabyte - <?php echo $web_title; ?></title>
	<link rel="canonical" href="#" />
    <!-- This Page CSS -->
    <link href="../assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="../assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jvector.css" rel="stylesheet" />
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- needed css -->
    <link href="../assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="../assets/libs/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <!-- transaction table -->
    <link href="../assets/extra-libs/toastr/dist/build/toastr.min.css" rel="stylesheet">
    <link href="../assets/libs/tablesaw/dist/tablesaw.css" rel="stylesheet">
    <!-- end transaction table -->
    <link href="../dist/js/pages/chartist/chartist-init.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--morris CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="../assets/libs/morris.js/morris.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css">
    <!-- NEEDED FOR FINANCE -->
    <link href="../assets/libs/nouislider/distribute/nouislider.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/nouislider/palette-noui.css" rel="stylesheet">
    <link href="../assets/extra-libs/nouislider/noui-slider.min.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/extra-libs/css-chart/css-chart.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <?php
    session_start();
    include("../function/db/connect.php");
    // display
    $user_id = $_SESSION["id"];
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $usertype = $_SESSION["usertype"];
    $status = $_SESSION["status"];
    // we are done!
    if ($usertype == "rep" && $status == "0") {
        echo header("location:  ../function/logout.php");
    }
    // get user more detials
    $select_user = mysqli_query($connection, "SELECT * FROM `users` WHERE id = '$user_id'");
    $pip = mysqli_fetch_array($select_user);
    $user_img = $pip["img"];
    $_SESSION["img"] = $user_img;
    $int_id = $pip["int_id"];
    $user_phone = $pip["phone"];
    $user_location = $pip["country"];
    $fullname = $pip["fullname"];
    // get
    if ($int_id != 0) {
    $get_int = mysqli_query($connection, "SELECT * FROM `institution` WHERE id = '$int_id'");
    if (mysqli_num_rows($get_int) >= 1) {
        $mi = mysqli_fetch_array($get_int);
        $lnglat = $mi["lnglat"];
        // echo $lnglat;
    } else {
        echo " ";
    }
}
    // page control
    if(!$_SESSION["username"] != ""){
        header("location: ../index.php");
        exit;
    }
    // aiit
    if($usertype == ""){
        header("location: ../index.php");
        exit;
    }
    ?>
    <input type="text" value="<?php echo $usertype ?>" id="main_user" hidden>
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header border-right">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../brand_logo/tera1.pmg" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <!-- <img src="../assets/images/logos/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <!-- <img src="../assets/images/logos/logo-text.png" alt="homepage" class="dark-logo" /> -->
                             <!-- Light Logo text -->    
                             <!-- <img src="../assets/images/logos/logo-light-text.png" class="light-logo" alt="homepage" /> -->
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-18"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-18 mdi mdi-gmail"></i>
                                <div class="notify">
                                    <span class="heartbit"></span>
                                    <span class="point"></span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title border-bottom">Message Notification Coming Soon!</div>
                                    </li>
                                    <li>
                                        <div class="message-center message-body">
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img"> <img src="../user_img/log.jpeg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                                                <span class="mail-contnet">
                                                    <h5 class="message-title">Message Notification goes here</h5> <span class="mail-desc">Holla!</span> <span class="time">9:30 AM</span> </span>
                                            </a>
                                            <!-- <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img"> <img src="../user_img/log.jpeg" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
                                                <span class="mail-contnet">
                                                    <h5 class="message-title">Han Tera</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </span>
                                            </a> -->
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link text-dark" href="javascript:void(0);"> <b>See all Notifications</b> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <?php
                    if ($usertype != "client" && $usertype != "rep") {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-check-circle font-18"></i>
                                <div class="notify">
                                    <span class="heartbit"></span>
                                    <span class="point"></span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title border-bottom">Tasks Notification Coming Soon!</div>
                                    </li>
                                    <li>
                                        <div class="message-center notifications">
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                <span class="mail-contnet">
                                                    <h5 class="message-title">Coming Soon!</h5> <span class="mail-desc">Just see new Task!</span> <span class="time">9:30 AM</span> </span>
                                            </a>
                                            <!-- <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                <span class="mail-contnet">
                                                    <h5 class="message-title">Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </span>
                                            </a>
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                <span class="mail-contnet">
                                                    <h5 class="message-title">Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </span>
                                            </a> -->
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center mb-1 text-dark" href="javascript:void(0);"> <strong>See all Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                        ?>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        <?php
                        if ($usertype != "client" && $usertype != "rep") {
                            ?>
                            <li class="nav-item dropdown mega-dropdown"><a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-md-block">Tech Support <i class="icon-options-vertical"></i></span>
                             <span class="d-block d-md-none"><i class="mdi mdi-dialpad font-24"></i></span>
                            </a>
                            <div class="dropdown-menu animated bounceInDown">
                                <div class="mega-dropdown-menu row">
                                    <div class="col-lg-3 col-xlg-2 mb-4">
                                        <h5 class="mb-3">24/7 TECH SUPPORT</h5>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container p-0"> <img class="d-block img-fluid" src="../user_img/log.jpeg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container p-0"><img class="d-block img-fluid" src="../user_img/log.jpeg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container p-0"><img class="d-block img-fluid" src="../user_img/log.jpeg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <h5 class="mb-3">Tech Tips</h5>
                                        <!-- Accordian -->
                                        <div id="accordion" class="accordion">
                                            <div class="card mb-1">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  TIP 1
                                                </button>
                                              </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Make sure you verify your problem very carefully
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-1">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  TIP 2
                                                </button>
                                              </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Keep a Screenshot and The Page Link
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-1">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  TIP 3
                                                </button>
                                              </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Make your complain is clear as possible, and include your username on the message.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3  mb-4">
                                        <h5 class="mb-3">CONTACT US</h5>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </div>
                                    <div class="col-lg-3 col-xlg-4 mb-4">
                                        <h5 class="mb-3">#STAY HAPPY AND SAVE</h5>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> 1. Always Wash Your Hands</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> 2. Practice Social Distancing</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> 3. Avoid Crowded Places</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> 4. Stay Happy with Pinza Studio</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> 5. Stay Positive with Terabyte</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                            <?php
                        }
                        ?>
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> 
                            <form class="app-search d-none d-lg-block">
                                <input type="text" class="form-control" placeholder="Search...">
                                <a href="" class="active"><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../client_img/<?php echo $user_img; ?>" height="40px" width="40px" alt="user" class="rounded-circle" width="36">
                                <span class="ml-2 font-medium">Pinza</span><span class="fas fa-angle-down ml-2"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                    <div class=""><img src="../client_img/<?php echo $user_img; ?>" alt="user" class="rounded" width="80"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0"><?php echo $username; ?></h4>
                                        <p class=" mb-0 text-muted"><?php echo $email; ?></p>
                                        <a href="tera_profile.php" class="btn btn-sm btn-danger text-white mt-2 btn-rounded">View Profile</a>
                                    </div>
                                </div>
                                <!-- <a class="dropdown-item" href="tera_profile.php"><i class="ti-user mr-1 ml-1"></i> My Profile</a> -->
                                <?php
                                if ($usertype != "client"){
                                    ?>
                                <a class="dropdown-item" href="client_bal.php"><i class="ti-wallet mr-1 ml-1"></i> My Earning</a>
                                <?php
                                }
                                 ?>
                                 <?php
                                if ($usertype != ""){
                                    $wal = mysqli_query($connection, "SELECT * FROM `account` WHERE user_id = '$user_id'");
                                    $oq = mysqli_fetch_array($wal);
                                    $wall_bal = number_format($oq["balance_derived"], 2);
                                    $dep_bal = number_format($oq["total_dep"], 2);
                                    $sp_bal = number_format($oq["total_with"], 2);
                                    ?>
                                    <?php
                                    if ($usertype == "client"){
                                    ?>
                                <a class="dropdown-item" href="client_bal.php"><i class="ti-wallet mr-1 ml-1"></i> Ad Balance &#8358; <?php echo $wall_bal; ?></a>
                                <?php
                                }
                                ?>
                                <?php
                                }
                                 ?>
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a> -->
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../function/logout.php"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark profile-dd" href="javascript:void(0)" aria-expanded="false">
                                <img src="../client_img/<?php echo $user_img; ?>" height="40px" width="40px" class="rounded-circle ml-2" width="30">
                                <span class="hide-menu"><?php echo $username; ?> </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="tera_profile.php" class="sidebar-link">
                                        <i class="ti-user"></i>
                                        <span class="hide-menu"> My Profile </span>
                                    </a>
                                </li>
                                <?php
                                if ($usertype != "client"){
                                    ?>
                                <li class="sidebar-item">
                                    <a href="client_bal.php" class="sidebar-link">
                                        <i class="ti-wallet"></i>
                                        <span class="hide-menu"> My Earning </span>
                                    </a>
                                </li>
                                <?php
                                }
                                ?>
                                <!-- <li class="sidebar-item">
                                    <a href="tera_box.php" class="sidebar-link">
                                        <i class="ti-email"></i>
                                        <span class="hide-menu"> Inbox </span>
                                    </a>
                                </li> -->
                                <!-- <li class="sidebar-item">
                                    <a href="javascript:void(0)" class="sidebar-link">
                                        <i class="ti-settings"></i>
                                        <span class="hide-menu"> Account Setting </span>
                                    </a>
                                </li> -->
                                <li class="sidebar-item">
                                    <a href="../function/logout.php" class="sidebar-link">
                                        <i class="fas fa-power-off"></i>
                                        <span class="hide-menu"> Logout </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        if ($usertype != "client"){
                            ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Dashboard</span> 
                                <!-- <span class="badge badge-inverse badge-pill ml-auto mr-3 font-medium px-2 py-1">2</span> -->
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <?php
                                if ($usertype == "super") {
                                ?>
                                <li class="sidebar-item">
                                    <a href="dashboard.php" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> General Overview </span>
                                    </a>
                                </li>
                                <?php
                                } else if ($usertype == "man") {
                                ?>
                                <li class="sidebar-item">
                                    <a href="man_dash.php" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Institution Activity </span>
                                    </a>
                                </li>
                                <?php
                                }
                            else if ($usertype == "rep") {
                            ?>
                            <li class="sidebar-item">
                                    <a href="withdrawal.php" class="sidebar-link">
                                        <i class="ti-wallet"></i>
                                        <span class="hide-menu">Withdrawal Earning</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="sidebar-item">
                           <a href="client_bal.php" class="sidebar-link">
                                <i class="ti-wallet"></i>
                                <span class="hide-menu">Tera Wallet</span>
                            </a>
                        </li>
                        <?php
                                if ($usertype == "client" || $usertype == "man" || $usertype == "rep" || $usertype == "super") {
                                    ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-hand-holding-usd"></i>
                                <span class="hide-menu">Promotion</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <?php
                                if ($usertype == "client" || $usertype == "man" || $usertype == "rep" || $usertype == "super") {
                                    ?>
                                    <li class="sidebar-item">
                                    <a href="create_promotion.php" class="sidebar-link">
                                        <i class="fas fa-chart-line"></i>
                                        <span class="hide-menu">Create</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="active_promo.php" class="sidebar-link">
                                        <i class="fas fa-chart-line"></i>
                                        <span class="hide-menu">Active</span>
                                    </a>
                                </li>
                                <!-- <li class="sidebar-item">
                                    <a href="inactive_promo.php" class="sidebar-link">
                                        <i class="fas fa-retweet"></i>
                                        <span class="hide-menu">Inactive</span>
                                    </a>
                                </li> -->
                                    <?php
                                } 
                                else if ($usertype == "man") {
                                    ?>
                                <li class="sidebar-item">
                                    <a href="ad_man.php" class="sidebar-link">
                                        <i class="fas fa-chart-line"></i>
                                        <span class="hide-menu">Ads Management</span>
                                    </a>
                                </li>
                                    <?php
                                } else if ($usertype == "rep") {
                                    ?>
                                    <li class="sidebar-item">
                                    <a href="share_ad.php" class="sidebar-link">
                                        <i class="fas fa-chart-line"></i>
                                        <span class="hide-menu">Share Ads</span>
                                    </a>
                                </li>
                                    <?php
                                }
                                ?>
                                <!-- <li class="sidebar-item">
                                    <a href="eco-products-checkout.html" class="sidebar-link">
                                        <i class="mdi mdi-clipboard-check"></i>
                                        <span class="hide-menu">Products Checkout</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <?php
                                }
                        ?>
                        <?php
                        if ($usertype != "client" && $usertype != "rep"){
                            ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-webhook"></i>
                                <span class="hide-menu"> Configuration </span>
                                <span class="badge badge-info badge-pill ml-auto mr-3 font-medium px-2 py-1">3</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="user_management.php" class="sidebar-link">
                                        <i class="mdi mdi-view-carousel"></i>
                                        <span class="hide-menu"> User Management</span>
                                    </a>
                                </li>
                                <?php
                                if ($usertype != "man") {
                                ?>
                                <li class="sidebar-item">
                                    <a href="sub_account.php" class="sidebar-link">
                                        <i class="mdi mdi-view-carousel"></i>
                                        <span class="hide-menu"> Sub Account & Pay Roll </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="coming_soon.php" class="sidebar-link">
                                        <i class="mdi mdi-crop-free"></i>
                                        <span class="hide-menu"> Roles and Permission</span>
                                    </a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($usertype != "client"){
                            ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tera_chat.php" aria-expanded="false">
                                <i class="mdi mdi-message-processing"></i>
                                <span class="hide-menu">Tera Chat</span>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($usertype != "client"){
                            ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="activity.php" aria-expanded="false">
                                <i class="mdi mdi-bullseye"></i>
                                <span class="hide-menu">Activity Management</span>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="coming_soonx.php" aria-expanded="false">
                                <i class="mdi mdi-archive"></i>
                                <span class="hide-menu">Archive</span>
                            </a>
                        </li>
                        <div class="devider"></div>
                       
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../function/logout.php" aria-expanded="false">
                                <i class="mdi mdi-adjust text-danger"></i>
                                <span class="hide-menu">Log Out</span>
                            </a>
                        </li>
                        <?php
                        if ($usertype != "client" && $usertype != "rep"){
                            ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="create_blog.php" aria-expanded="false">
                                <i class="mdi mdi-adjust text-success"></i>
                                <span class="hide-menu">Blog Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="coming_soonxx.php" aria-expanded="false">
                                <i class="mdi mdi-adjust text-dark"></i>
                                <span class="hide-menu">Guide & Documentation</span>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="faq.php" aria-expanded="false">
                                <i class="mdi mdi-adjust text-info"></i>
                                <span class="hide-menu">FAQs</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0"><?php echo $web_title; ?></h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <a class="btn btn-danger text-white float-right ml-3 d-none d-md-block" href="create_promotion.php">+ Promotion</a>
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Promotion</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->