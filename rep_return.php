<?php
$web_title = "Rep Feedback";
$current = "rep";
include("header_i.php");
include("ajaxcall.php");
include("function/db/connect.php");
?>
 <!-- Banner Section -->
 <section class="banner-section banner-one banner-one-page" id="home">
            <div class="banner-carousel owl-theme owl-carousel">
                <!-- Slide Item -->
                <div class="slide-item">
                    <div class="image-layer" style="background-image: url(img/internet-ai.jpg);"></div>

                    <div class="auto-container">
                        <div class="content-box">
                            <div class="content">
                                <div class="inner text-center">
                                    <div class="sub-title">welcome to Terabyte</div>
                                    <h1>
                                     CONGRATULATIONS <br />
                                        <span>Please check your registration status below</span>
                                    </h1>
                                    <div class="link-box">
                                        <a class="theme-btn btn-style-one" href="about.php">
                                            <i class="btn-curve"></i>
                                            <span class="btn-title">Discover More</span>
                                        </a>
                                        <div class="vid-link">
                                            <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ"
                                                class="lightbox-image">
                                                <div class="icon">
                                                    <span class="flaticon-play-button-1"></span><i class="ripple"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide Item -->
                <div class="slide-item">
                    <div class="image-layer" style="background-image: url(img/black-woman.jpg);"></div>

                    <div class="auto-container">
                        <div class="content-box">
                            <div class="content">
                                <div class="inner text-center">
                                    <div class="sub-title">welcome to Terabyte</div>
                                    <h1>
                                        Earn <br />
                                        <span>Cash Daily</span>
                                    </h1>
                                    <div class="link-box">
                                        <a class="theme-btn btn-style-one" href="about.php">
                                            <i class="btn-curve"></i>
                                            <span class="btn-title">Discover More</span>
                                        </a>
                                        <div class="vid-link">
                                            <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ"
                                                class="lightbox-image">
                                                <div class="icon">
                                                    <span class="flaticon-play-button-1"></span><i class="ripple"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Banner Section -->

        <!--About Section-->
        <section class="about-section" id="about">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Image Column-->
                    <div class="image-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner">
                            <div class="image-block wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <img src="img/black-woman.jpg" alt="" />
                            </div>

                            <div class="image-block wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <img src="img/social-media-ar.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                    <!--Text Column-->
                    <div class="text-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner">
                            <div class="sec-title">
                                <h2>
                                    Terabyte <br /> Rep
                                    <span class="dot">.</span>
                                </h2>
                                <div class="lower-text">
                                    Check Registration Status Below after watching the tutorial vide carefully.
                                </div>
                            </div>
                            <div class="text">
                                <p>
                                    Please Input either - Matric, E-mail or Username.
                                </p>
                            </div>
                            <div class="form-box">
                    <div class="default-form">
                            <div class="row clearfix">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <script>
                $(document).ready(function() {
                  $('#idm').on("change keyup paste click", function(){
                    var id = $(this).val();
                    $.ajax({
                      url:"ams/ajax_post/rep_check.php",
                      method:"POST",
                      data:{id:id},
                      success:function(data){
                        $('#make_user').html(data);
                      }
                    })
                  });
                });
              </script>
                                    <div class="field-inner">
                                        <input type="text" name="un" value="" placeholder="input rep identity"
                                            required="" id="idm"/>
                                    </div>
                                    <p><div id="make_user"></div></p>
                                </div>
                            </div>
                    </div>
                            </div>
                            <div class="link-box">
                                <a class="theme-btn btn-style-one" href="login.php">
                                    <i class="btn-curve"></i>
                                    <span class="btn-title">Login</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Live Section-->
<?php
// approval
include("footer_i.php");
?>