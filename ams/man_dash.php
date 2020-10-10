<?php
$web_title = "Dashboard";
include("header.php");
if ($usertype == "man") {
                $query_us = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user_id'");
                $qu = mysqli_fetch_array($query_us);
                $is_dis = $qu["is_disabled"];
                $int_id = $qu["int_id"];
                if ($is_dis == "0") {
            ?>
  <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- First Cards Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                        <?php
                                                $client_q = mysqli_query($connection, "SELECT * FROM `man_approval` WHERE int_id = '$int_id'");
                                                $no_client = mysqli_num_rows($client_q);
                                                ?>
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Clients</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="icon-people text-info"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal"><?php echo $no_client; ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                        <?php
                                                $shrd = mysqli_query($connection, "SELECT * FROM `ad_transaction` WHERE int_id = '$int_id'");
                                                $no_sh = mysqli_num_rows($shrd);
                                                ?>
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Shared Ads</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="fas fa-chart-line text-primary"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal"><?php echo $no_sh; ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                        <?php
                                                $shrd = mysqli_query($connection, "SELECT * FROM `ad_transaction` WHERE int_id = '$int_id'");
                                                $no_sh = (mysqli_num_rows($shrd) / 20000) * 100;
                                                ?>
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Conversion Rate - 20,000 Goal</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="fas fa-balance-scale text-danger"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal"><?php echo $no_sh."%"; ?></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                        <?php
                                             $sql1 = mysqli_query($connection,"SELECT SUM(debit) AS balance_derived FROM `ad_transaction` WHERE int_id = '$int_id'");
                                             $q1 = mysqli_fetch_array($sql1);
                                             $reach = number_format($q1["balance_derived"], 2);
                                            ?>
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Institution Earning</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="ti-wallet text-success"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal">&#8358; <?php echo $reach; ?></span></h2>
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
                                    <h5 class="card-title text-uppercase mb-0">Institution Manager Earning</h5>
                                    <div class="ml-auto">
                                        <small class="text-success"><i class="fas fa-sort-up"></i> 18% High then last month</small>
                                    </div>
                                 </div>
                                <div class="d-flex flex-row">
                                    <div class="p-2 pl-0 border-right">
                                        <h6 class="font-light">Overall Growth</h6><span class="font-medium">80.40%</span></div>
                                    <div class="p-2 border-right">
                                        <h6 class="font-light">Montly</h6><span class="font-medium">20.40%</span>
                                    </div>
                                    <div class="p-2">
                                        <h6 class="font-light">Day</h6><span class="font-medium">5.40%</span>
                                    </div>
                                </div>
                                <?php
                                 $current_date = date('Y-m-d');
                                 // echo $current_date;
                                 $qtr_date = date('Y-m-d', strtotime("-4 months", strtotime($current_date)));
                                 $month_date = date('Y-m-d', strtotime("-1 months", strtotime($current_date)));
                                 $year_date = date('Y-m-d', strtotime("-1 years", strtotime($current_date)));
                                 $week_date = date('Y-m-d', strtotime("-1 weeks", strtotime($current_date)));
                                 $day_date = date('Y-m-d', strtotime("-1 days", strtotime($current_date)));
                                $get_cash = mysqli_query($connection, "SELECT * FROM ad_transaction WHERE (created_date >= '$qtr_date') AND (created_date <= '$current_date') AND (transaction_type = 'man debit') AND int_id = '$int_id'");
                                while($row = mysqli_fetch_array($get_cash))
                                 {
                                   // color
                                    $getallx[] = array($row['amount']);
                                    $remodelx = str_replace("".'"'."","", json_encode($getallx)); 
                                $final_lx = str_replace("[","", $remodelx); 
                                $final_rx = str_replace("]","", $final_lx); 
                                // echo $final_rx."A";
                                }
                                // sec
                                $get_cashx = mysqli_query($connection, "SELECT * FROM ad_transaction WHERE (created_date >= '$qtr_date') AND (created_date <= '$current_date') AND (transaction_type = 'rep debit') AND int_id = '$int_id'");
                                while($row = mysqli_fetch_array($get_cashx))
                                 {
                                   // color
                                    $getallxx[] = array($row['amount']);
                                    $remodelxx = str_replace("".'"'."","", json_encode($getallxx)); 
                                $final_lxx = str_replace("[","", $remodelxx); 
                                $final_rxx = str_replace("]","", $final_lxx); 
                                // echo $final_rx."A";
                                }
                                ?>
                                <script>
                                    $(document).ready(function() {
                                    var Spk = function() { 
                                        $('#man_income').sparkline([<?php echo $final_rx ?>], {
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
                                     $('#cash_q').sparkline([<?php echo $final_rxx ?>], {
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
                                   sparkResize = setTimeout(Spk, 500);
                                  });
                                  Spk();
                                 })
                                </script>
                                <div id="man_income" class="sparkchart mt-3"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="card-title text-uppercase mb-0">Institution Rep Earning</h5>
                                    <div class="ml-auto">
                                        <small class="text-danger"><i class="fas fa-sort-down"></i> 18% High then last month</small>
                                    </div>
                                 </div>
                                <div class="d-flex flex-row">
                                    <div class="p-2 pl-0 border-right">
                                        <h6 class="font-light">Overall Growth</h6><span class="font-medium">80.40%</span></div>
                                    <div class="p-2 border-right">
                                        <h6 class="font-light">Montly</h6><span class="font-medium">20.40%</span>
                                    </div>
                                    <div class="p-2">
                                        <h6 class="font-light">Day</h6><span class="font-medium">5.40%</span>
                                    </div>
                                </div>
                                <div id="cash_q" class="sparkchart mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Country Visit, Weather cards Row  -->
                <!-- ============================================================== -->
                <div class="row">
                <?php
                                    $sum_day = mysqli_query($connection, "SELECT SUM(amount) AS daily FROM ad_transaction WHERE (created_date >= '$day_date') AND (created_date <= '$current_date') AND int_id = '$int_id'");
                                    $sd = mysqli_fetch_array($sum_day);
                                    $sum_week = mysqli_query($connection, "SELECT SUM(amount) AS weekly FROM ad_transaction WHERE (created_date >= '$week_date') AND (created_date <= '$current_date') AND int_id = '$int_id'");
                                    $cw = mysqli_fetch_array($sum_week);
                                    $sum_year = mysqli_query($connection, "SELECT SUM(amount) AS yearly FROM ad_transaction WHERE (created_date >= '$year_date') AND (created_date <= '$current_date') AND int_id = '$int_id'");
                                    $cy = mysqli_fetch_array($sum_year);
                                    $day = $sd["daily"];
                                    $week = $cw["weekly"];
                                    $year = $cy["yearly"];
                                    $sum_month = mysqli_query($connection, "SELECT SUM(amount) AS monthly FROM ad_transaction WHERE (created_date >= '$month_date') AND (created_date <= '$current_date') AND int_id = '$int_id'");
                                    $c = mysqli_fetch_array($sum_month);
                                    $month_amount = $c["monthly"];
                                    ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
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
                </div>
                <!-- ============================================================== -->
                <!-- Sales cards & Carousel Row  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase mb-0">Institution Active Users</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap user-table mb-0">
                                  <thead>
                                  <?php
                        $query1 = "SELECT * FROM `users` WHERE int_id = '$int_id'";
                        $result1 = mysqli_query($connection, $query1);
                      ?>
                                    <tr>
                                      <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Role</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Contact</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Date Joined</th>
                                      <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {?>
                                    <tr>
                                      <td class="pl-4">1</td>
                                      <td>
                                          <h5 class="font-medium mb-0"><?php echo $row1["fullname"]; ?></h5>
                                      </td>
                                      <?php
                                                if ($row1["usertype"] == "rep") {
                                                    $t = "Rep";
                                                } else if ($row1["usertype"] == "man") {
                                                    $t = "Manager";
                                                }
                                                ?>
                                      <td>
                                          <span class="text-muted"><?php echo $t; ?></span><br>
                                          <?php
                                                $int = $row1["int_id"];
                                                $slect_int = mysqli_query($connection, "SELECT * FROM `institution` WHERE id ='$int'");
                                                $mp = mysqli_fetch_array($slect_int);
                                                $int_name = $mp["name"];
                                                ?>
                                          <span class="text-muted"><?php echo $int_name; ?></span>
                                      </td>
                                      <td>
                                          <span class="text-muted"><?php echo $row1["email"];?></span><br>
                                          <span class="text-muted"><?php echo $row1["phone"];?></span>
                                      </td>
                                      <td>
                                          <!-- <span class="text-muted">15 Mar 2020</span><br> -->
                                          <span class="text-muted"><?php echo $row1["created_date"]; ?></span>
                                      </td>
                                      <!-- <td>
                                        <select class="form-control category-select" id="exampleFormControlSelect1">
                                          <option>Super Admin</option>
                                          <option>Manager</option>
                                        </select>
                                      </td> -->
                                      <td>
                                        <a href="user_management.php" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ti-key"></i> </a>
                                        <!-- <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-upload"></i> </button> -->
                                      </td>
                                    </tr>
                                    <?php }
                                          }
                                    else {
                                    // echo "0 Document";
                                    }
                                    ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
                } else {
                ?>
                <h1>YOU HAVE BEEN DISABLED</h1>
                <?php
                }
            }
include("footer.php");
?>