<?php
$web_title = "Withdrawal Option";
include("header.php");
?>
<!-- a withdawal page -->
<!-- check if the account have upto 100 naira -->
<?php
if ($wall_bal < 100.00) {
?>
<!-- make  ove -->
<div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mt-0"><i class="ti-mobile" style="color: #008080"></i></h1>
                                <h3>AIRTIME</h3>
                                <span class="pull-right">Charge: 0%</span>
                                <span class="font-500">Buy Airtime</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mt-0"><i class="ti-signal" style="color: #008080"></i></h1>
                                <h3>MOBILE DATA</h3>
                                <span class="pull-right">Charge: 0%</span>
                                <span class="font-500">Buy Mobile Data</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mt-0"><i class="ti-bolt-alt" style="color: #008080"></i></h1>
                                <h3>ELECTRICITY BILLS</h3>
                                <span class="pull-right">Charge: 1%</span>
                                <span class="font-500">Buy Power</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mt-0"><i class="mdi mdi-bank" style="color: #008080"></i></h1>
                                <h3>BANK TRANSFER</h3>
                                <span class="pull-right">Charge: 3%</span>
                                <span class="font-500">Withdraw directly to your Bank</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">PRODUCT SUMMARY</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="../../assets/images/gallery/chair.jpg" alt="iMac" width="80"></td>
                                                <td>Rounded Chair</td>
                                                <td>20</td>
                                                <td class="font-500">$153</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-500" align="right">Total Amount</td>
                                                <td class="font-500">$153</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <h5 class="card-title">Choose payment Option</h5>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#iprofile" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Debit Card</span>
                                    </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#ihome" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-user"></i></span> 
                                        <span class="hidden-xs">Paypal</span>
                                    </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="ihome">
                                        <br/> You can pay your money through paypal, for more info <a href="">click here</a>
                                        <br>
                                        <br>
                                        <button class="btn btn-info"><i class="fab fa-cc-paypal"></i> Pay with Paypal</button>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="iprofile">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <form>
                                                    <div class="form-group input-group mt-5">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fab fa-cc-visa"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Card Number" aria-label="Amount (to the nearest dollar)">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-7 col-md-7">
                                                            <div class="form-group">
                                                                <label>EXPIRATION DATE</label>
                                                                <input type="text" class="form-control" name="Expiry" placeholder="MM / YY" required=""> </div>
                                                        </div>
                                                        <div class="col-xs-5 col-md-5 pull-right">
                                                            <div class="form-group">
                                                                <label>CV CODE</label>
                                                                <input type="text" class="form-control" name="CVC" placeholder="CVC" required=""> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>NAME OF CARD</label>
                                                                <input type="text" class="form-control" name="nameCard" placeholder="NAME AND SURNAME"> </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-info">Make Payment</button>
                                                </form>
                                            </div>
                                            <div class="col-md-4 ml-auto">
                                                <h4 class="card-title mt-4">General Info</h4>
                                                <h2><i class="fab fa-cc-visa text-info"></i> <i class="fab fa-cc-mastercard text-danger"></i> <i class="fab fa-cc-discover text-success"></i> <i class="fab fa-cc-amex text-warning"></i></h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<!-- done -->
<?php
} else {
    echo '<script type="text/javascript">
  $(document).ready(function(){
   swal.fire({
    type: "error",
    title: "You Dont Have Enough Money NGN 100.00",
    text: "Try to Earn More",
   showConfirmButton: false,
    timer: 2000
    }).then(
    function (result) {
      history.go(-1);
    }
    )
    });
   </script>
  ';
}
?>
<!-- else take out -->
<?php
include("footer.php");
?>