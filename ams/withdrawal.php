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
                <!-- we are done with a table -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Choose Withdrawal Option</h5>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#iairtime" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-mobile"></i></span><span class="hidden-xs"> Airtime</span>
                                    </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#idata" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-signal"></i></span> 
                                        <span class="hidden-xs">Mobile Data</span>
                                    </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#ibill" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-bolt-alt"></i></span> 
                                        <span class="hidden-xs">Electricity Bills</span>
                                    </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#ibank" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="mdi mdi-bank"></i></span> 
                                        <span class="hidden-xs">Bank Withdrawal</span>
                                    </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="idata">
                                    <div class="row">
                                            <div class="col-md-7">
                                                <form>
                                                    <div class="form-group input-group mt-5">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-mobile"></i></span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Enter Number">
                                                    </div>
                                                    <div class="form-group input-group mt-5">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-mobile"></i></span>
                                                        </div>
                                                        <select name="" class="form-control" id="">
                                                            <option value="MTN">MTN</option>
                                                            <option value="AIRTEL">AIRTEL</option>
                                                            <option value="GLO">GLO</option>
                                                            <option value="9mobile">9MOBILE</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-7 col-md-7">
                                                            <div class="form-group">
                                                                <label>Plan</label>
                                                                <input type="number" class="form-control" name="Expiry" placeholder="Data Plan" required=""> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control" name="nameCard" placeholder="Enter Password"> </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-info">Buy Mobile Data</button>
                                                </form>
                                            </div>
                                            <div class="col-md-4 ml-auto">
                                                <h4 class="card-title mt-4">General Info</h4>
                                                <p>Mobile Data - MTN, AIRTEL, 9MOBILE and GLO.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="iairtime">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <form>
                                                    <div class="form-group input-group mt-5">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-mobile"></i></span>
                                                        </div>
                                                        <select name="" class="form-control" id="">
                                                            <option value="MTN">MTN</option>
                                                            <option value="AIRTEL">AIRTEL</option>
                                                            <option value="GLO">GLO</option>
                                                            <option value="9mobile">9MOBILE</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-7 col-md-7">
                                                            <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="number" class="form-control" name="Expiry" placeholder="Enter Phone Number" required=""> </div>
                                                        </div>
                                                        <div class="col-xs-5 col-md-5 pull-right">
                                                            <div class="form-group">
                                                                <label>Amount</label>
                                                                <input type="number" class="form-control" name="CVC" placeholder="Enter Amount" required=""> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control" name="nameCard" placeholder="Enter Password"> </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-info">Buy Airtime</button>
                                                </form>
                                            </div>
                                            <div class="col-md-4 ml-auto">
                                                <h4 class="card-title mt-4">General Info</h4>
                                                <p>Airtime  - MTN, AIRTEL, 9MOBILE and GLO.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="ibill">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <form>
                                                    <div class="form-group input-group mt-5">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-mobile"></i></span>
                                                        </div>
                                                        <select name="" class="form-control" id="">
                                                            <option value="">SELECT DISCO</option>
                                                            <option value="AEDC">AEDC: Abuja</option>
                                                            <option value="KAEDC">KAEDC: Kaduna</option>
                                                            <option value="JEDC">JEDC: Jos</option>
                                                            <option value="IKEDC">IKEDC: Ikeja</option>
                                                            <option value="EKEDC">EKEDC: Eko</option>
                                                            <option value="KEDC">KEDC: Kano</option>
                                                            <option value="EEDC">EEDC: Enugu</option>
                                                            <option value="PHEDC">PHEDC: Phortharcout</option>
                                                            <option value="IBEDC">IBEDC: Ibadan</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-7 col-md-7">
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <select name="" class="form-control" id="">
                                                            <option value="PREPAID">PREPAID</option>
                                                            <option value="POSTPAID">POSTPAID</option>
                                                        </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-5 col-md-5 pull-right">
                                                            <div class="form-group">
                                                                <label>Meter No</label>
                                                                <input type="number" class="form-control" name="CVC" placeholder="Enter Amount" required=""> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control" name="nameCard" placeholder="Enter Password"> </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-info">Buy Electricity</button>
                                                </form>
                                            </div>
                                            <div class="col-md-4 ml-auto">
                                                <h4 class="card-title mt-4">General Info</h4>
                                                <p>Electricity - • "AEDC": Abuja, • "KAEDC":Kaduna,• "JEDC": Jos, • "IKEDC": Ikeja, • "EKEDC": Eko, • "KEDC": Kano, • "EEDC": Enugu, • "PHEDC": Phortharcout, • "IBEDC" : Ibadan.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="ibank">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <form>
                                                    <div class="form-group input-group mt-5">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="mdi mdi-bank"></i></span>
                                                        </div>
                                                        <select name="" class="form-control" id="">
                                                            <option value="">SELECT BANK</option>
                                                            <option value="">GT BANK</option>
                                                            <option value="">WEMA BANK PLC</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-7 col-md-7">
                                                            <div class="form-group">
                                                                <label>Account Number</label>
                                                                <input type="number" class="form-control" name="Expiry" placeholder="Enter Phone Number" required=""> </div>
                                                        </div>
                                                        <div class="col-xs-5 col-md-5 pull-right">
                                                            <div class="form-group">
                                                                <label>Amount</label>
                                                                <input type="number" class="form-control" name="CVC" placeholder="Enter Amount" required=""> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control" name="nameCard" placeholder="Enter Password"> </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-info">Withdraw</button>
                                                </form>
                                            </div>
                                            <div class="col-md-4 ml-auto">
                                                <h4 class="card-title mt-4">General Info</h4>
                                                <p>Any Bank.</p>
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