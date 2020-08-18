<?php
$web_title = "Contact";
$current = "contact";
include("header_i.php");
?>
<!-- start -->
 <!-- Banner Section -->
 <section class="page-banner">
            <div class="image-layer" style="background-image: url(img/internet-ai.jpg);"></div>
            <div class="shape-1"></div>
            <div class="shape-2"></div>
            <div class="banner-inner">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <h1>Contact</h1>
                        <div class="page-nav">
                            <ul class="bread-crumb clearfix">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Banner Section -->

        <!--Contact Section-->
        <section class="contact-section">
            <div class="auto-container">
                <div class="sec-title centered">
                    <h2>Offices near you<span class="dot">.</span></h2>
                </div>

                <div class="upper-info">
                    <div class="row clearfix">
                        <div class="info-block col-xl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h5>Osun State, Nigeria</h5>
                                <div class="text">
                                    <ul class="info">
                                        <li>Block 19 zone B central market,
Obafemi Awolowo University, <br />Ile-Ife Osun state Nigeria</li>
<li>
                                            <a href="mailto:support@thisistera.com">support@thisistera.com</a>
                                        </li>
                                        <li><a href="tel:+2347030316605">+234 703 031 6605</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="info-block col-xl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h5>Abuja, Nigeria</h5>
                                <div class="text">
                                    <ul class="info">
                                        <li>Coming soon!</li>
                                        <li>
                                            <a href="mailto:support@thisistera.com">support@thisistera.com</a>
                                        </li>
                                        <li><a href="tel:+2347030316605">+234 703 031 6605</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="info-block col-xl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h5>Lagos, Nigeria</h5>
                                <div class="text">
                                <ul class="info">
                                        <li>Coming soon!</li>
                                        <li>
                                            <a href="mailto:support@thisistera.com">support@thisistera.com</a>
                                        </li>
                                        <li><a href="tel:+2347030316605">+234 703 031 6605</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="info-block col-xl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h5>Benin, Nigeria</h5>
                                <div class="text">
                                <ul class="info">
                                        <li>Coming soon!</li>
                                        <li>
                                            <a href="mailto:support@thisistera.com">support@thisistera.com</a>
                                        </li>
                                        <li><a href="tel:+2347030316605">+234 703 031 6605</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="map-box">
                    <iframe class="map-iframe"
                        src="https://maps.google.com/maps?q=Block%2019%20zone%20B%20central%20market%2C%20Obafemi%20Awolowo%20University%2C%20Ile-Ife%20Osun%20state%20Nigeria&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        style="border: 0;" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="form-box">
                    <div class="sec-title">
                        <h2>Write Us a Message<span class="dot">.</span></h2>
                    </div>
                    <div class="default-form">
                        <form method="post" action="sendemail.php" id="contact-form">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="text" name="username" value="" placeholder="Your Name"
                                            required="" />
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="email" name="email" value="" placeholder="Email Address"
                                            required="" />
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="text" name="phone" value="" placeholder="Phone Number"
                                            required="" />
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="text" name="subject" value="" placeholder="Subject" required="" />
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="field-inner">
                                        <textarea name="message" placeholder="Write Message" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <button class="theme-btn btn-style-one">
                                        <i class="btn-curve"></i>
                                        <span class="btn-title">Send message</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<!-- end -->
<?php
include("footer_i.php");
?>