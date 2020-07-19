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
                                        <h2 class="mb-0 display-6"><span class="font-normal">23</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Shared Ads</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="fas fa-chart-line text-primary"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal">169</span></h2>
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
                                        <h2 class="mb-0 display-6"><span class="font-normal">311</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Institution Earning</h5>
                                <div class="d-flex align-items-center mb-2 mt-4">
                                    <h2 class="mb-0 display-5"><i class="ti-wallet text-success"></i></h2>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 display-6"><span class="font-normal">&#8358;1.2 M</span></h2>
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
                                    <h5 class="card-title text-uppercase mb-0">Institution Income</h5>
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
                                <div id="spark1" class="sparkchart mt-3"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="card-title text-uppercase mb-0">Ad Clicks</h5>
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
                                <div id="spark2" class="sparkchart mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Country Visit, Weather cards Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Institution Sales Rank</h5>
                                <ul class="list-style-none country-state mt-4">
                                   <li class="mb-4">
                                        <h2 class="mb-0">6350</h2>
                                        <small>From Uni-lag</small>
                                        <div class="float-right">48% <i class="fas fa-level-up-alt text-success"></i></div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 48%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <h2 class="mb-0">6350</h2>
                                        <small>From Uni-Ben</small>
                                        <div class="float-right">48% <i class="fas fa-level-up-alt text-success"></i></div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 48%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <h2 class="mb-0">3250</h2>
                                        <small>From Uni-Abuja</small>
                                        <div class="float-right">98% <i class="fas fa-level-up-alt text-success"></i></div>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 48%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <h2 class="mb-0">1250</h2>
                                        <small>From FUTA</small>
                                        <div class="float-right">75% <i class="fas fa-level-down-alt text-danger"></i></div>
                                        <div class="progress">
                                            <div class="progress-bar bg-inverse" role="progressbar" style="width: 48%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <h2 class="mb-0">1350</h2>
                                        <small>From FUTO</small>
                                        <div class="float-right">48% <i class="fas fa-level-up-alt text-success"></i></div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 48%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <h2 class="mb-0">6350</h2>
                                        <small>From LASU</small>
                                        <div class="float-right">48% <i class="fas fa-level-up-alt text-success"></i></div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 48%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <h2 class="mb-0">3250</h2>
                                        <small>From KWASU</small>
                                        <div class="float-right">98% <i class="fas fa-level-up-alt text-success"></i></div>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 48%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="mb-0">1250</h2>
                                        <small>From BABCOCK</small>
                                        <div class="float-right">75% <i class="fas fa-level-down-alt text-danger"></i></div>
                                        <div class="progress">
                                            <div class="progress-bar bg-inverse" role="progressbar" style="width: 48%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Daliy Sales</h5>
                                        <div class="text-right">
                                            <span class="text-muted font-light">Today's Income</span>
                                            <h2 class="mt-2 display-7"><sup><i class="ti-arrow-up text-success"></i></sup>&#8358;12,000</h2>
                                        </div>
                                        <span class="text-success">20%</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Weekly Sales</h5>
                                        <div class="text-right">
                                            <span class="text-muted font-light">Weekly Income</span>
                                            <h2 class="mt-2 display-7"><sup><i class="ti-arrow-down text-danger"></i></sup>&#8358;5,000</h2>
                                        </div>
                                        <span class="text-success">30%</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Monthly Sales</h5>
                                        <div class="text-right">
                                            <span class="text-muted font-light">Monthly Income</span>
                                            <h2 class="mt-2 display-7"><sup><i class="ti-arrow-up text-info"></i></sup>&#8358;10,000</h2>
                                        </div>
                                        <span class="text-info">60%</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Yearly Sales</h5>
                                        <div class="text-right">
                                            <span class="text-muted font-light">Yearly Income</span>
                                            <h2 class="mt-2 display-7"><sup><i class="ti-arrow-up text-inverse"></i></sup>&#8358;9,000</h2>
                                        </div>
                                        <span class="text-inverse">20%</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-inverse" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
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
                                <h5 class="card-title text-uppercase mb-0">Institution Users</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap user-table mb-0">
                                  <thead>
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
                                      <!-- <td>
                                        <select class="form-control category-select" id="exampleFormControlSelect1">
                                          <option>Super Admin</option>
                                          <option>Manager</option>
                                        </select>
                                      </td> -->
                                      <td>
                                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ti-key"></i> </button>
                                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="icon-trash"></i> </button>
                                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-pencil-alt"></i> </button>
                                        <!-- <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-upload"></i> </button> -->
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
include("footer.php");
?>