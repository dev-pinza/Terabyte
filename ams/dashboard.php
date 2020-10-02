<?php
$web_title = "Dashboard";
include("header.php");
?>
  <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- First Cards Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Clients</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="icon-people text-info"></i></h2>
                                    <div class="ml-auto">
                                        <?php
                                        $check_client = mysqli_query($connection, "SELECT * FROM users WHERE usertype = 'client'");
                                        $c_d = number_format(mysqli_num_rows($check_client));
                                         ?>
                                        <h2 class="mb-0 display-6"><span class="font-normal"><?php echo $c_d; ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Promoted Ads</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="fas fa-chart-line text-primary"></i></h2>
                                    <div class="ml-auto">
                                    <?php
                                        $check_pro = mysqli_query($connection, "SELECT * FROM ad_promotion WHERE payment_status = 'active'");
                                        $pro = number_format(mysqli_num_rows($check_pro));
                                         ?>
                                        <h2 class="mb-0 display-6"><span class="font-normal"><?php echo $pro; ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Conversion Rate</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="fas fa-balance-scale text-danger"></i></h2>
                                    <div class="ml-auto">
                                        <?php
                                        $q_q = mysqli_query($connection, "SELECT SUM(aud_reach) AS reach FROM ad_promotion WHERE payment_status = 'active'");
                                        $mx = mysqli_fetch_array($q_q);
                                        $reach = number_format($mx["reach"]);
                                        ?>
                                        <h2 class="mb-0 display-6"><span class="font-normal"><?php echo $reach; ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Tera Wallet</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="ti-wallet text-success"></i></h2>
                                    <div class="ml-auto">
                                    <?php
                                        $q_b = mysqli_query($connection, "SELECT SUM(balance_derived) AS balance FROM account");
                                        $mb = mysqli_fetch_array($q_b);
                                        $balance = number_format($mb["balance"], 2);
                                        ?>
                                        <h2 class="mb-0 display-6"><span class="font-normal">&#8358; <?php echo $balance; ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Country and Visit, Traffic cards Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Universities Conversion</h5>
                                <div id="usa" style="height: 382px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="card-title text-uppercase mb-0">Institution Quarter Income</h5>
                                    <div class="ml-auto">
                                        <small class="text-success">last 4 months data</small>
                                    </div>
                                 </div>
                                 <?php
                                // loan 4 month back transaction
                                $current_date = date('Y-m-d');
                                // echo $current_date;
                                $qtr_date = date('Y-m-d', strtotime("-4 months", strtotime($current_date)));
                                $month_date = date('Y-m-d', strtotime("-1 months", strtotime($current_date)));
                                $year_date = date('Y-m-d', strtotime("-1 years", strtotime($current_date)));
                                $week_date = date('Y-m-d', strtotime("-1 weeks", strtotime($current_date)));
                                $day_date = date('Y-m-d', strtotime("-1 days", strtotime($current_date)));
                                // echo $qtr_date;
                                // SUM SELECT FOR MONTH AND DAY
                                $sum_month = mysqli_query($connection, "SELECT SUM(amount) AS monthly FROM ad_transaction WHERE (created_date >= '$month_date') AND (created_date <= '$current_date') AND transaction_type = 'ad credit'");
                                $c = mysqli_fetch_array($sum_month);
                                $all_month = mysqli_query($connection, "SELECT SUM(amount) AS total_month FROM ad_transaction WHERE (created_date >= '$month_date') AND (created_date <= '$current_date')");
                                $cx = mysqli_fetch_array($all_month);
                                $month_amount = $c["monthly"];
                                $all_month = $cx["total_month"];
                                $monthly_per = ($month_amount / $all_month) * 100;
                                // SELECT
                                $qr_debit = mysqli_query($connection, "SELECT SUM(debit) AS total_debit FROM ad_transaction WHERE (created_date >= '$qtr_date') AND (created_date <= '$current_date')");
                                $qr_credit = mysqli_query($connection, "SELECT SUM(credit) AS total_credit FROM ad_transaction WHERE (created_date >= '$qtr_date') AND (created_date <= '$current_date')");
                                $qd = mysqli_fetch_array($qr_debit);
                                $qc = mysqli_fetch_array($qr_credit);
                                $all_debit = $qd["total_debit"];
                                $all_credit = $qc["total_credit"];
                                $qtr_per = ($all_credit / $all_debit) * 100;
                                if ($qtr_per > 100) {
                                    $qtr_per = 99;
                                }
                                $get_qtr = mysqli_query($connection, "SELECT * FROM ad_transaction WHERE created_date BETWEEN '$qtr_date' AND '$current_date' AND transaction_type = 'ad credit'");
                                while($row = mysqli_fetch_array($get_qtr))
                                 {
                                   // color
                                    $getall[] = array($row['amount']);
                                }
                                ?>
                                <?php
                                $remodel = str_replace("".'"'."","", json_encode($getall)); 
                                $final_l = str_replace("[","", $remodel); 
                                $final_r = str_replace("]","", $final_l); 
                                // echo $final_r;
                                // cashflow
                                $get_cash = mysqli_query($connection, "SELECT * FROM acct_transaction WHERE (transaction_date >= '$qtr_date') AND (transaction_date <= '$current_date')");
                                while($rows = mysqli_fetch_array($get_cash))
                                 {
                                   // color
                                    $getallx[] = array($rows['amount']);
                                    $remodelx = str_replace("".'"'."","", json_encode($getallx)); 
                                $final_lx = str_replace("[","", $remodelx); 
                                $final_rx = str_replace("]","", $final_lx); 
                                }
                                ?>
                                <script>
                                    $(document).ready(function() {
                                    var Spkup = function() { 
                                        $('#int_income').sparkline([<?php echo $final_r ?>], {
                                       type: 'line',
                                       width: '100%',
                                       height: '160',
                                       chartRangeMax: 50,
                                       resize: true,
                                       lineColor: '#008080',
                                       fillColor: 'rgba(0, 110, 90, 0.3)',
                                       highlightLineColor: 'rgba(0,0,0,.1)',
                                       highlightSpotColor: 'rgba(0,0,0,.2)',
                                     });
                                     $('#cash_flow').sparkline([<?php echo $final_rx ?>], {
                                       type: 'line',
                                       width: '100%',
                                       height: '160',
                                       chartRangeMax: 50,
                                       resize: true,
                                       lineColor: '#ff00dd',
                                       fillColor: 'rgba(80, 28, 112, 0.3)',
                                       highlightLineColor: 'rgba(0,0,0,.1)',
                                       highlightSpotColor: 'rgba(0,0,0,.2)',
                                     });
                                   }
                                   var sparkResize;
                                   $(window).resize(function(e) {
                                   clearTimeout(sparkResize);
                                   sparkResize = setTimeout(Spkup, 500);
                                  });
                                  Spkup();
                                 })
                                </script>
                                <div class="d-flex flex-row">
                                    <div class="p-2 pl-0 border-right">
                                        <h6 class="font-light">Overall Growth</h6><span class="font-medium"><?php echo number_format($qtr_per, 2) ?>%</span></div>
                                    <div class="p-2">
                                        <h6 class="font-light">Monthly</h6><span class="font-medium"><?php echo number_format($monthly_per, 2) ?>%</span>
                                    </div>
                                </div>
                                <div id="int_income" class="sparkchart mt-3"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="card-title text-uppercase mb-0">Cash Flow</h5>
                                    <div class="ml-auto">
                                        <small class="text-success"> Last 4 Months Chart Report</small>
                                    </div>
                                 </div>
                                <div class="d-flex flex-row">
                                    <div class="p-2 pl-0 border-right">
                                        <h6 class="font-light">Overall Growth</h6><span class="font-medium"><?php echo number_format($qtr_per, 2) ?>%</span></div>
                                    <!-- <div class="p-2">
                                        <h6 class="font-light">Day</h6><span class="font-medium">5.40%</span>
                                    </div> -->
                                </div>
                                <div id="cash_flow" class="sparkchart mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Country Visit, Weather cards Row  -->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- Sales cards & Carousel Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <?php
                                    $sum_day = mysqli_query($connection, "SELECT SUM(amount) AS daily FROM ad_transaction WHERE (created_date >= '$day_date') AND (created_date <= '$current_date') AND transaction_type = 'ad credit'");
                                    $sd = mysqli_fetch_array($sum_day);
                                    $sum_week = mysqli_query($connection, "SELECT SUM(amount) AS weekly FROM ad_transaction WHERE (created_date >= '$week_date') AND (created_date <= '$current_date') AND transaction_type = 'ad credit'");
                                    $cw = mysqli_fetch_array($sum_week);
                                    $sum_year = mysqli_query($connection, "SELECT SUM(amount) AS yearly FROM ad_transaction WHERE (created_date >= '$year_date') AND (created_date <= '$current_date') AND transaction_type = 'ad credit'");
                                    $cy = mysqli_fetch_array($sum_year);
                                    $day = $sd["daily"];
                                    $week = $cw["weekly"];
                                    $year = $cy["yearly"];
                                    ?>
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Daliy Sales</h5>
                                        <div class="text-right">
                                            <span class="text-muted font-light">Today's Income</span>
                                            <h2 class="mt-2 display-7">&#8358;  <?php echo number_format($day, 2); ?></h2>
                                        </div>
                                        <!-- <span class="text-success">20%</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Weekly Sales</h5>
                                        <div class="text-right">
                                            <span class="text-muted font-light">Weekly Income</span>
                                            <h2 class="mt-2 display-7">&#8358; <?php echo number_format($week, 2); ?></h2>
                                        </div>
                                        <!-- <span class="text-success">30%</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Monthly Sales</h5>
                                        <div class="text-right">
                                            <span class="text-muted font-light">Monthly Income</span>
                                            <h2 class="mt-2 display-7"><sup></sup>&#8358; <?php echo number_format($month_amount, 2); ?></h2>
                                        </div>
                                        <!-- <span class="text-info">60%</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Yearly Sales</h5>
                                        <div class="text-right">
                                            <span class="text-muted font-light">Yearly Income</span>
                                            <h2 class="mt-2 display-7">&#8358; <?php echo number_format($year, 2); ?></h2>
                                        </div>
                                        <!-- <span class="text-inverse">2</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-inverse" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div id="carouselExampleIndicators" class="carousel slide primary-carousel" data-ride="carousel">
                                <ol class="carousel-indicators d-none">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100 p-img" src="../assets/images/background/img3.jpg" alt="First slide">
                                        <div class="card-img-overlay text-white">
                                            <span class="badge badge-danger badge-pill text-white font-medium">TOP AD</span>
                                            <h2 class="mt-3">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h2>
                                            <div class="mt-5">
                                                <a href="#" class="text-muted read-more font-light text-uppercase">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100 p-img" src="../assets/images/background/img4.jpg" alt="Second slide">
                                        <div class="card-img-overlay text-white">
                                            <span class="badge badge-danger badge-pill text-white font-medium">Primary</span>
                                            <h2 class="mt-3">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h2>
                                            <div class="mt-5">
                                                <a href="#" class="text-muted read-more font-light text-uppercase">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100 p-img" src="../assets/images/background/img6.jpg" alt="Third slide">
                                        <div class="card-img-overlay text-white">
                                            <span class="badge badge-info badge-pill text-white font-medium">Primary</span>
                                            <h2 class="mt-3">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h2>
                                            <div class="mt-5">
                                                <a href="#" class="text-muted read-more font-light text-uppercase">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev d-none" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next d-none" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Institution Sales/Revenue Rank</h5>
                                <ul class="list-style-none country-state mt-4">
                                    <?php
                                     $don = "SELECT * FROM `institution` ORDER BY revenue ASC";
                                     $result = mysqli_query($connection, $don);
                                     if (mysqli_num_rows($result) >= 1) {
                                     while ($pox = mysqli_fetch_array($result)) {
                                    ?>
                                   <li class="mb-4">
                                        <h2 class="mb-0"><?php echo $pox["name"]; ?></h2>
                                        <small><?php echo $pox["state"]; ?></small>
                                        <div class="float-right">.<i class="fas fa-level-up-alt text-success"></i></div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 42%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <?php
                                     }
                                    } else {
                                        echo "NO INSTITUTION";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table Row  -->
                <!-- ============================================================== -->
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase mb-0">Campus Manager</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap user-table mb-0">
                                  <thead>
                                    <tr>
                                      <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Role & University</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Added</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Category</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td class="pl-4">1</td>
                                      <td>
                                          <h5 class="font-medium mb-0">Daniel Kristeen</h5>
                                          <span class="text-muted">Texas, Unitedd states</span>
                                      </td>
                                      <td>
                                          <span class="text-muted">Lead Manager</span><br>
                                          <span class="text-muted">BABCOCK</span>
                                      </td>
                                      <td>
                                          <span class="text-muted">daniel@gmail.com</span><br>
                                          <span class="text-muted">+234 - 8162399614</span>
                                      </td>
                                      <td>
                                          <span class="text-muted">15 Mar 2020</span><br>
                                          <span class="text-muted">10: 55 AM</span>
                                      </td>
                                      <td>
                                        <select class="form-control category-select" id="exampleFormControlSelect1">
                                          <option>Super Admin</option>
                                          <option>Manager</option>
                                        </select>
                                      </td>
                                      <td>
                                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ti-key"></i> </button>
                                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="icon-trash"></i> </button>
                                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-pencil-alt"></i> </button>
                                        < <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-upload"></i> </button> -->
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
<?php
include("footer.php");
?>