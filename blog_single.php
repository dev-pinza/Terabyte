<?php
$web_title = "Tera Blog";
$current = "blog";
include("header_i.php");
?>
 <section class="page-banner">
            <div class="image-layer" style="background-image: url(img/crowd.jpg);"></div>
            <div class="shape-1"></div>
            <div class="shape-2"></div>
            <div class="banner-inner">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <h1>Blog Posts</h1>
                        <div class="page-nav">
                            <ul class="bread-crumb clearfix">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Blog Posts</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Banner Section -->
        <!-- <style>
            img {
max-width: 100%;
max-height: 100%;
object-fit: contain;
}
.image-box {
height: 444px;
width: 770px;
}
        </style> -->
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Content Side-->
                    <div class="content-side col-lg-8 col-md-12 col-sm-12">
                        <div class="blog-posts">
                            <!--News Block-->
                            <?php
                            if (isset($_GET["view"])) {
                            $post_id = $_GET["view"];
                            }
                            $query1 = "SELECT * FROM `blog_post` WHERE id = '$post_id'";
                            $result1 = mysqli_query($connection, $query1);
                            ?>
                            <?php if (mysqli_num_rows($result1) > 0) {
                        $row1 = mysqli_fetch_array($result1);
                        ?>
                            <div class="news-block-two">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <img src="ams/blog_post/<?php echo $row1["visual"] ?>" alt="" />
                                        <?php
                                        $type = $row1["type"];
                                        if ($type != "Image") {
                                            ?>
                                            <a href="<?php echo $row1["link"]; ?>"
                                            class="vid-link lightbox-image">
                                            <div class="icon">
                                                <span class="flaticon-play-button-1"></span>
                                            </div>
                                        </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="lower-box">
                                        <div class="post-meta">
                                            <ul class="clearfix">
                                                <li><span class="far fa-clock"></span> <?php echo $row1["date"] ?></li>
                                                <li>
                                                <?php
                                                $b_uid = $row1["user_id"];
                                                $query_n = mysqli_query($connection, "SELECT * FROM users WHERE id = '$b_uid'");
                                                $n = mysqli_fetch_array($query_n);
                                                $b_full = $n["fullname"];
                                                ?>
                                                    <span class="far fa-user-circle"></span> <?php echo $b_full; ?>
                                                </li>
                                                <!-- <li>
                                                    <span class="far fa-comments"></span> 2 Comments
                                                </li> -->
                                            </ul>
                                        </div>
                                        <h4>
                                          <?php echo $row1["title"]; ?>
                                        </h4>
                                        <div class="text">
                                        <?php echo $row1["sub_title"]; ?>
                                        </div>
                                        <div class="link-text">
                                            <?php echo $row1["body"]; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                          }
                                    else {
                                    echo "NO POST AT THE MOMENT";
                                    }
                                    ?>
                            <!--News Block-->
                            <!--News Block-->
                            <!--News Block-->

                            <!--News Block-->
                        </div>
                    </div>

                    <!--Sidebar Side-->
                    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar blog-sidebar">
                            <!--Sidebar Widget-->
                            <div class="sidebar-widget search-box">
                                <div class="widget-inner">
                                    <form method="post" action="blog.html">
                                        <div class="form-group">
                                            <input type="search" name="search-field" value="" placeholder="Search"
                                                required="" />
                                            <button type="submit">
                                                <span class="icon flaticon-magnifying-glass-1"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="sidebar-widget recent-posts">
                                <div class="widget-inner">
                                    <div class="sidebar-title">
                                        <h4>Latest Posts</h4>
                                    </div>
                                    <?php
                        $query1 = "SELECT * FROM `blog_post` ORDER BY id ASC LIMIT 5";
                        $result1 = mysqli_query($connection, $query1);
                      ?>
                      <?php if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {?>
                                    <div class="post">
                                        <figure class="post-thumb">
                                            <img src="ams/blog_post/<?php echo $row1["visual"] ?>" alt="" />
                                        </figure>
                                        <h5 class="text">
                                            <a href="blog_single.php?view=<?php echo $row1["id"];?>"><?php echo $row1["title"]; ?></a>
                                        </h5>
                                    </div>
                                    <?php }
                                          }
                                    else {
                                    echo "NO POST AT THE MOMENT";
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- <div class="sidebar-widget archives">
                                <div class="widget-inner">
                                    <div class="sidebar-title">
                                        <h4>Categories</h4>
                                    </div>
                                    <ul>
                                        <li><a href="blog.html">Business</a></li>
                                        <li class="active">
                                            <a href="blog.html">Introductions</a>
                                        </li>
                                        <li><a href="blog.html">One Page Template</a></li>
                                        <li><a href="blog.html">Parallax Effects</a></li>
                                        <li><a href="blog.html">New Technologies</a></li>
                                        <li><a href="blog.html">Video Backgrounds</a></li>
                                    </ul>
                                </div>
                            </div> -->

                            <div class="sidebar-widget popular-tags">
                                <div class="widget-inner">
                                    <div class="sidebar-title">
                                        <h4>Tags</h4>
                                    </div>
                                    <?php
                        $query1 = "SELECT * FROM `blog_post` ORDER BY id ASC LIMIT 5";
                        $result1 = mysqli_query($connection, $query1);
                      ?>
                      <?php if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {?>
                                    <div class="tags-list clearfix">
                                        <a href="#"><?php echo $row1["tag"]; ?></a>
                                    </div>
                                    <?php }
                                          }
                                    else {
                                    echo "NO TAG AT THE MOMENT";
                                    }
                                    ?>
                                </div>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </div>

<?php
include("footer_i.php");
?>