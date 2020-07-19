<?php
$web_title = "Earning";
include("header.php");
?>
<!-- start the html -->
 <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Yearly Sales Charts Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="font-medium">&#8358;354.50</h2>
                                        <h5 class="text-muted mb-0">Total Income</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="" id="ravenue"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="font-medium">3456</h2>
                                        <h5 class="text-muted mb-0">Yearly Sales</h5>
                                    </div>
                                    <div class="col-6">
                                        <div id="ct-main-bal" style="height: 57px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="font-medium">356</h2>
                                        <h5 class="text-muted mb-0">Monthly Sales</h5>
                                    </div>
                                    <div class="col-6">
                                        <div id="ct-extra" style="height: 57px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales, Expance & Finance Charts Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="card">
                            <div class="p-3">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title text-uppercase mb-0">Cash Flow</h5>
                                    <div class="ml-auto">
                                        <ul class="list-inline dl mb-0">
                                            <li class="list-inline-item text-info"><i class="fa fa-circle"></i> Income</li>
                                            <li class="list-inline-item text-danger"><i class="fa fa-circle"></i> Expense</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="ct-visits" style="height: 265px;"></div>
                            </div>
                            <div class="row no-gutters border-top">
                                <div class="col-md-6 border-right border-bottom">
                                    <div class="d-flex align-items-center px-4 py-3">
                                        <h2 class="mb-0 text-info display-7">
                                            <i class="ti-headphone-alt"></i>
                                        </h2>
                                        <div class="ml-4">
                                            <h2 class="font-normal">&#8358;250</h2>
                                            <h4>Entertainment</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 border-bottom">
                                    <div class="d-flex align-items-center px-4 py-3">
                                        <h2 class="mb-0 text-info display-7">
                                            <i class="ti-home"></i>
                                        </h2>
                                        <div class="ml-4">
                                            <h2 class="font-normal">&#8358;60.50</h2>
                                            <h4>House Rent</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 border-right">
                                    <div class="d-flex align-items-center px-4 py-3">
                                        <h2 class="mb-0 text-info display-7">
                                            <i class="far fa-paper-plane"></i>
                                        </h2>
                                        <div class="ml-4">
                                            <h2 class="font-normal">&#8358;28</h2>
                                            <h4>Travel</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 border-sm-top">
                                    <div class="d-flex align-items-center px-4 py-3">
                                        <h2 class="mb-0 text-info display-7">
                                            <i class="ti-shopping-cart"></i>
                                        </h2>
                                        <div class="ml-4">
                                            <h2 class="font-normal">&#8358;70</h2>
                                            <h4>Shopping</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Sales</h5>
                                <div class="mt-3">
                                    <div id="morris-donut-chart" style="height:350px; padding-top: 50px;"></div>
                                </div>
                                <div class="d-flex align-items-center mt-4">
                                    <div>
                                        <h3 class="font-medium text-uppercase">Total Sales</h3>
                                        <h5 class="text-muted">160 sales monthly</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <button class="btn btn-info btn-circle btn-lg text-white">
                                            <i class="ti-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Chart && Calendar App Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-5">  
                        <div class="card">
                            <div class="p-4">
                                <div class="d-flex flex-row">
                                    <div class=""><img src="../user_img/log.jpeg" alt="user" class="rounded-circle" width="100" /></div>
                                    <div class="pl-4">
                                        <h3>Daniel Samuel</h3>
                                        <h4>UNI ABUJA Manager - Chemical Engineering</h4>
                                        <button class="btn btn-success btn-rounded text-white text-uppercase font-14"><i class="ti-plus mr-2"></i> Follow</button>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col border-right text-center">
                                        <h2 class="font-light">14</h2>
                                        <h4 class="text-uppercase">Post</h4></div>
                                    <div class="col border-right text-center">
                                        <h2 class="font-light">543</h2>
                                        <h4 class="text-uppercase">Conversion</h4></div>
                                    <div class="col text-center">
                                        <h2 class="font-light">14</h2>
                                        <h4 class="text-uppercase">Shared</h4></div>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <h4 class="font-medium text-center">Followers</h4>
                                <ul class="list-style-none list-icons d-flex flex-item text-center pt-2">
                                    <li class="col px-2">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Shaina Chhatraliya">
                                            <img src="../user_img/log.jpeg" alt="user" class="rounded-circle" width="50" />
                                        </a>
                                    </li>
                                    <li class="col px-2">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Nirav Joshi">
                                            <img src="../user_img/log.jpeg" alt="user" class="rounded-circle" width="50" />
                                        </a>
                                    </li>
                                    <li class="col px-2">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Vishal Bhatt">
                                            <img src="../user_img/log.jpeg" alt="user" class="rounded-circle" width="50" />
                                        </a>
                                    </li>
                                    <li class="col px-2">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="More">
                                            <button class="btn btn-circle btn-info text-white btn-lg" href="javascript:void(0)">
                                                8
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-2 border-top">
                                <ul class="list-style-none list-icons d-flex flex-item text-center">
                                    <li class="col"><a href="javascript:void(0)" class="text-muted" data-toggle="tooltip" title="Website"><i class="fa fa-globe font-20"></i></a></li>
                                    <li class="col"><a href="javascript:void(0)" class="text-muted" data-toggle="tooltip" title="twitter"><i class="fab fa-twitter font-20"></i></a></li>
                                    <li class="col"><a href="javascript:void(0)" class="text-muted" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-square font-20"></i></a></li>
                                    <li class="col"><a href="javascript:void(0)" class="text-muted" data-toggle="tooltip" title="Youtube"><i class="fab fa-youtube font-20"></i></a></li>
                                    <li class="col"><a href="javascript:void(0)" class="text-muted" data-toggle="tooltip" title="Linkdin"><i class="fab fa-linkedin font-20"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-4 position-relative">
                                    <div class="card-body">
                                        <span class="display-6"><span class="font-normal">23</span></span>
                                        <h4 class="pb-2 mb-0">Thursday</h4> 
                                        <span class="weight-border"></span>
                                        <h5 class="pt-3">March 2017</h5>
                                        <div class="bottom-text">
                                            <a href="#" class="text-info text-uppercase">3 Tasks</a>
                                            <h5 class="mb-0 mt-2">Prepare Project</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="bg-light text-muted">
                                        <div class="table-responsive">
                                            <table class="calendar-schedule-table">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5">
                                                            <h1 class="month-option text-dark">March</h1>
                                                        </td>
                                                        <td></td>
                                                        <td><a href="#" class="font-24"><i class="ti-plus text-dark"></i></a></td>
                                                    </tr>
                                                    <tr class="text-uppercase">
                                                        <td>Sun</td>
                                                        <td>Mon</td>
                                                        <td>Tue</td>
                                                        <td>Wed</td>
                                                        <td>Thu</td>
                                                        <td>Fri</td>
                                                        <td>Sat</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td>6</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                        <td>10</td>
                                                        <td>11</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                    </tr>
                                                    <tr>
                                                        <td>14</td>
                                                        <td>15</td>
                                                        <td>16</td>
                                                        <td>17</td>
                                                        <td>18</td>
                                                        <td>19</td>
                                                        <td>20</td>
                                                    </tr>
                                                    <tr>
                                                        <td>21</td>
                                                        <td>22</td>
                                                        <td class="cal-active">23</td>
                                                        <td>24</td>
                                                        <td>25</td>
                                                        <td>26</td>
                                                        <td>27</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28</td>
                                                        <td>29</td>
                                                        <td>30</td>
                                                        <td>31</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Yearly Sales Charts  Row  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Yearly Sales Charts  Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Weekly Usage</h5>
                                <h2 class="font-medium">&#8358;58.80</h2>
                                <div class="">
                                    <div id="weeksales-bar" class="position-relative" style="height: 314px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h5 class="card-title text-uppercase">Mothly Usage</h5>
                                <h2 class="font-medium">&#8358;60.80</h2>
                                <div class="gaugejs-box d-flex justify-content-center mt-5 mb-4">
                                    <canvas id="foo" class="gaugejs">guage</canvas>
                                </div>
                            </div>
                            <div class="d-flex align-items-center p-3">
                                <div>
                                    <span class="mb-0 display-7"><span class="font-medium">26.30</span></span>
                                    <h4 class="mb-0 font-light">AMps Used</h4>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-info btn-circle btn-lg text-white">
                                        <i class="icon-speedometer"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Earnings & Feed Row  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="p-4 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="mb-0 font-light">Total Earnings</h4>
                                        <h2 class="mb-0 font-medium">&#8358;580.50</h2>
                                    </div>
                                    <div class="ml-auto">
                                        <select class="form-control">
                                            <option>January 2020</option>
                                            <option>February 2020</option>
                                            <option>March 2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-light">
                                <div class="d-flex align-items-center py-3">
                                    <!-- <img src="../assets/images/users/1.jpg" class="rounded-circle" width="60"> -->
                                    <div class="ml-3">
                                        <h4 class="font-normal mb-0">192.168.4778:9 Nigeria | Abuja</h4>
                                        <span class="text-muted">10-11-2016</span>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 text-info font-medium">&#8358;46</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center py-3">
                                    <!-- <img src="../assets/images/users/2.jpg" class="rounded-circle" width="60"> -->
                                    <div class="ml-3">
                                        <h4 class="font-normal mb-0">192.168.4878:9 Nigeria | Kano</h4>
                                        <span class="text-muted">01-11-2020</span>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 text-info font-medium">&#8358;56</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center py-3">
                                    <!-- <img src="../assets/images/users/3.jpg" class="rounded-circle" width="60"> -->
                                    <div class="ml-3">
                                        <h4 class="font-normal mb-0">192.168.4778:97 Nigeria | Lagos</h4>
                                        <span class="text-muted">26-03-2020</span>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 text-info font-medium">&#8358;78</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center py-3">
                                    <!-- <img src="../assets/images/users/1.jpg" class="rounded-circle" width="60"> -->
                                    <div class="ml-3">
                                        <h4 class="font-normal mb-0">192.165.4778:9 Nigeria | Abuja</h4>
                                        <span class="text-muted">14-04-2020</span>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="mb-0 text-info font-medium">&#8358;12</h2>
                                    </div>
                                </div>
                                <div class="pt-3">
                                    <button type="button" class="btn btn-danger text-white btn-rounded btn-block">Withdrow Money</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase mb-1">Feeds</h5>
                                <div class="feed-widget">
                                    <ul class="feed-body list-style-none">
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <button class="btn btn-info btn-circle">
                                                <i class="far fa-bell text-white"></i>
                                            </button>
                                            <span class="ml-3 font-light">You have 4 pending tasks.</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light">Just Now</span>
                                            </div>
                                        </li>
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <button class="btn btn-success btn-circle">
                                                <i class="ti-server text-white"></i>
                                            </button>
                                            <span class="ml-3 font-light">Server #1 overloaded.</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light">2 Hours ago</span>
                                            </div>
                                        </li>
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <button class="btn btn-warning btn-circle">
                                                <i class="ti-shopping-cart text-white"></i>
                                            </button>
                                            <span class="ml-3 font-light">New order received.</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light">31 May</span>
                                            </div>
                                        </li>
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <button class="btn btn-danger btn-circle">
                                                <i class="ti-user text-white"></i>
                                            </button>
                                            <span class="ml-3 font-light">New user registered.</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light">30 May</span>
                                            </div>
                                        </li>
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <button class="btn btn-inverse btn-circle">
                                                <i class="ti-user text-white"></i>
                                            </button>
                                            <span class="ml-3 font-light">New Version just arrived.</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light">27 May</span>
                                            </div>
                                        </li>
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <button class="btn btn-info btn-circle">
                                                <i class="far fa-bell text-white"></i>
                                            </button>
                                            <span class="ml-3 font-light">You have 4 pending tasks.</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light">Just Now</span>
                                            </div>
                                        </li>
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <button class="btn btn-danger btn-circle">
                                                <i class="ti-user text-white"></i>
                                            </button>
                                            <span class="ml-3 font-light">New user registered.</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light">30 May</span>
                                            </div>
                                        </li>
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <button class="btn btn-inverse btn-circle">
                                                <i class="far fa-bell text-white"></i>
                                            </button>
                                            <span class="ml-3 font-light">New Version just arrived.</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light">27 May</span>
                                            </div>
                                        </li>
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <button class="btn btn-primary btn-circle">
                                                <i class="far fa-bell text-white"></i>
                                            </button>
                                            <span class="ml-3 font-light">You have 4 pending tasks.</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light">27 May</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
<!-- end the html -->
<?php
include("footer.php");
?>