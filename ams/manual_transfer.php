<?php
$web_title = "Manual Transfer";
include("header.php");
?>
<!-- a withdawal page -->

<!-- check if the account have upto 100 naira -->
<?php
if ($usertype == "super") {
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
                                <h3>Manager manual Transfer</h3>
                                <span class="pull-right">Charge: 0%</span>
                                <span class="font-500">Transfer to Managers</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->
                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mt-0"><i class="mdi mdi-bank" style="color: #008080"></i></h1>
                                <h3>BANK TRANSFER</h3>
                                <span class="pull-right">Charge: 3%</span>
                                <span class="font-500">Withdraw directly to your Bank</span>
                            </div>
                        </div>
                    </div> -->
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
                                <h5 class="card-title">Transfer to Manager's Wallet</h5>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#iairtime" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-mobile"></i></span><span class="hidden-xs"> Manager </span>
                                    </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="iairtime">
                                    <div class="row">
                                            <div class="col-md-7">
                                                <form>
                                                    <div class="form-group input-group mt-5">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-mobile"></i></span>
                                                        </div>
                                                        <input type="number" id="amount" class="form-control" placeholder="Enter Amount">
                                                    </div>
                                                    <div class="form-group input-group mt-5">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                                        </div>
                                                        <?php
                                                        function fill_manager($connection)
                                                        {
                                                            $sint_id = $_SESSION["int_id"];
                                                            $org = "SELECT * FROM `users` WHERE usertype = 'man' AND is_disabled = '0' ORDER BY `id` ASC";
                                                            $res = mysqli_query($connection, $org);
                                                            $output = '';
                                                            while ($row = mysqli_fetch_array($res)) {
                                                                $int_id = $row["int_id"];
                                                                $query_m = mysqli_query($connection, "SELECT * FROM `institution` WHERE id = '$int_id'");
                                                                $xc = mysqli_fetch_array($query_m);
                                                                $int_name = $xc["name"];
                                                                $output .= '<option value="' . $row["id"] . '">' .strtoupper($row["username"])." - " .strtoupper($row["fullname"]). " - " .strtoupper($int_name).'</option>';
                                                            }
                                                            return $output;
                                                        }
                                                        ?>
                                                        <select name="" class="form-control" id="manager">
                                                            <option value="">SELECT MANAGER</option>
                                                            <?php echo fill_manager($connection); ?>
                                                        </select>
                                                        <script>
        $(document).ready(function() {
            $('#data_pay').on("click", function() {
                                  var amount = $('#amount').val();
                                  var manager = $('#manager').val();
                                  var pin = $('#pin_d').val();
                                  if (amount != "" && manager != "" && pin != "") {
                                  $.ajax({
                                    url:"ajax_post/manual/transfer.php",
                                    method:"POST",
                                    data:{ amount:amount, manager:manager, pin:pin},
                                    success:function(data){
                                      $('#finish_buying').html(data);
                                    }
                                  });
                                  }
                                });
                              });
                            </script>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-12">
                                                            <div class="form-group">
                                                            <!-- <div id="qwerty"></div> -->
                                                                <!-- <label>Plan</label>
                                                                <input type="number" class="form-control" name="Expiry" placeholder="Data Plan" required=""> </div> -->
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" id="pin_d" class="form-control" name="nameCard" placeholder="Enter Password"> </div>
                                                        </div>
                                                    </div>
                                                    <a id="data_pay" class="btn btn-info">Transfer</a>
                                                    
                            <div id="finish_buying"></div>
                                                </form>
                                            </div>
                                            <div class="col-md-4 ml-auto">
                                                <h4 class="card-title mt-4">General Info</h4>
                                                <p>Make Transfer, note <b>Please Carefully make Transfer, cause it's irreversible</b> .</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- airtime -->
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
    title: "Authorization Denied",
    text: "Youre not fit for this page",
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