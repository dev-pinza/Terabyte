<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Terabyte | <?php echo $web_title; ?></title>
    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <link href="css/owl.css" rel="stylesheet" />
    <link href="css/flaticon.css" rel="stylesheet" />
    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/jquery-ui.css" rel="stylesheet" />
    <link href="css/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="css/hover.css" rel="stylesheet" />
    <link href="css/custom-animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- rtl css -->
    <link href="css/rtl.css" rel="stylesheet" />
    <!-- Responsive File -->
    <link href="css/responsive.css" rel="stylesheet" />

    <!-- Color css -->
    <link rel="stylesheet" id="jssDefault" href="css/colors/color-default.css" />

    <link rel="shortcut icon" href="images/favicon.png" id="fav-shortcut" type="image/x-icon" />
    <link rel="icon" href="images/favicon.png" id="fav-icon" type="image/x-icon" />

    <!-- Responsive Settings -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if lt IE 9
      ]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script
    ><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <div class="icon"></div>
        </div>

        <!-- Main Header -->
        <header class="main-header header-style-two">
            <!-- Header Upper -->
            <div class="header-upper">
                <div class="inner-container clearfix">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo">
                            <a href="index.php" title="Terabyte | Home"><img
                                    src="images/Terabyte-logo-06.png" class="main-logo"
                                    alt="Linoor - Terabyte"
                                    title="Linoor - Terabyte" /><img src="images/Terabyte-logo-06.png"
                                    id="thm-logo" alt="Linoor - Terabyte"
                                    title="Linoor - Terabyte" class="stricked-logo" /></a>
                        </div>
                    </div>
                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <span class="icon flaticon-menu-2"></span><span class="txt">Menu</span>
                        </div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="<?php if ($current == "home"){ echo "current";} ?> dropdown">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="<?php if ($current == "about"){ echo "current";} ?> "><a href="about.php">About Us</a></li>
                                    <li class="<?php if ($current == "service"){ echo "current";} ?>">
                                        <a href="service.php">Services</a>
                                    </li>
                                    <li>
                                        <a href="#">Blog</a>
                                    </li>
                                    <li class="<?php if ($current == "contact"){ echo "current";} ?>">
                                        <a href="contact.php">Contact</a>
                                    </li>
                                    <li>
                                        <a href="login.php">Login/Signup</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="other-links clearfix">
                        <!--Search Btn-->
                        <div class="search-btn">
                            <button type="button" class="theme-btn search-toggler">
                                <span class="flaticon-loupe"></span>
                                <!-- <span>s i g n u p / l o g i n</span> -->
                            </button>
                        </div>
                        <div class="link-box">
                            <div class="call-us">
                                <a class="link" href="tel:+2347030316605">
                                    <span class="icon"></span>
                                    <span class="sub-text">Call Anytime</span>
                                    <span class="number">+234 703 031 6605</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>
        <!-- End Main Header -->
        <!--Mobile Menu-->
<div class="side-menu__block">
            <div class="side-menu__block-overlay custom-cursor__overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div>
            <!-- /.side-menu__block-overlay -->
            <div class="side-menu__block-inner">
                <div class="side-menu__top justify-content-end">
                    <a href="#" class="side-menu__toggler side-menu__close-btn"><img src="images/icons/close-1-1.png"
                            alt="" /></a>
                </div>
                <!-- /.side-menu__top -->

                <nav class="mobile-nav__container">
                    <!-- content is loading via js -->
                </nav>
                <div class="side-menu__sep"></div>
                <!-- /.side-menu__sep -->
                <!-- /.side-menu__content -->
            </div>
            <!-- /.side-menu__block-inner -->
        </div>
        <!-- /.side-menu__block -->

        <!--Search Popup-->
        <div class="search-popup">
            <div class="search-popup__overlay custom-cursor__overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div>
            <!-- /.search-popup__overlay -->
            <div class="search-popup__inner">
                <form action="#" class="search-popup__form">
                    <input type="text" name="search" placeholder="Type here to Search...." />
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!-- /.search-popup__inner -->
        </div>
        <!-- /.search-popup -->