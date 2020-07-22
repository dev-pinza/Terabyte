<?php
$web_title = "Tera wallet";
include("header.php");
$digits = 9;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
$transaction_id = "TERA".$randms;
?>
<!-- start -->
<div class="page-content container-fluid">
<div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card" style="background-color: #008080;">
                            <div class="card-body">
                                <div id="myCarousel22" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item flex-column active">
                                            <div class="d-flex no-block al mr-3ign-items-center">
                                                <i class="cc EOS-alt text-white display-6 mr-3" title="EOS"></i>
                                                <div class="mt-2">
                                                    <h5 class="text-white font-medium">TERA WALLET BALANCE</h5>
                                                    <h6 class="text-white">Available Cash for Ad promotion (&#8358; <?php echo $wall_bal; ?>)</h6>
                                                </div>
                                                <div class="ml-auto mt-3">
                                                    <div class="crypto"></div>
                                                </div>
                                            </div>
                                            <div class="ml-auto">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark" data-toggle="modal"
                                                data-target="#createmodelint">
                                                Refill Account
                                            </button>
                                        </div>
                                    </div>
                                            <div class="row text-center text-white mt-4">
                                                <div class="col-4">
                                                    <span class="font-14">Total Deposit</span>
                                                    <p class="font-medium"><i class="fa fa-arrow-up"></i> &#8358; <?php echo $dep_bal; ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <span class="font-14">Current Balance</span>
                                                    <p class="font-medium"><i class="ti-wallet"></i> &#8358; <?php echo $wall_bal; ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <span class="font-14">Total Spent</span>
                                                    <p class="font-medium"><i class="fa fa-arrow-down"></i> &#8358; <?php echo $sp_bal; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transaction Details</h4>
                                <h5 class="card-subtitle">View Your Transaction details </h5>
                                <table class="tablesaw table-bordered table-hover table no-wrap" data-tablesaw-mode="swipe"
                                    data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap
                                    data-tablesaw-mode-switch>
                                    <thead>
                                    <?php
                        $query1 = "SELECT * FROM `acct_transaction` WHERE `user_id` = '$user_id'";
                        $result1 = mysqli_query($connection, $query1);
                      ?>
                                        <tr>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" class="border">
                                                Description</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                                data-tablesaw-priority="3" class="border">Date</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="border">Credit
                                            </th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" class="border">
                                                Debit
                                            </th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" class="border">
                                            <abbr title="Rotten Tomato Rating">Balance</abbr>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {?>
                                        <tr>
                                            <td><?php echo $row1["transaction_type"]; ?></td>
                                            <td class="title"><?php echo $row1["transaction_date"]; ?></td>
                                            <td><?php echo number_format($row1["credit"], 2); ?></td>
                                            <td><?php echo number_format($row1["debit"], 2); ?></td>
                                            <td><?php echo number_format($row1["account_balance"], 2); ?></td>
                                        </tr>
                                        <?php }
                                          }
                                    else {
                                        ?>
                                         <div class="ml-auto">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark" data-toggle="modal"
                                                data-target="#createmodelint">
                                                Make Payment
                                            </button>
                                        </div>
                                    </div>
                                        <?php
                                    // echo "0 Document";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
</div>
<!-- end -->

<!-- modal popup -->
<div class="modal fade" id="createmodelint" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="form" action="ajax_post/paystack/initialize.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-wallet -alt mr-2"></i> Create
                                    Deposit Cash into your Tera Wallet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i
                                            class="ti-cup text-white"></i></button>
                                    <input type="text" class="form-control" name="amt" placeholder="Enter Amount"
                                        aria-label="name">
                                </div>
                                <label for="">Transaction no.</label>
                                <div class="input-group mb-3">
                                    <!-- <button type="button" class="btn btn-info"><i
                                            class="ti-cup text-white"></i></button> -->
                                            
                                    <input type="text" class="form-control" readonly
                                        aria-label="name" name="trans" value="<?php echo $transaction_id; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="payup" type="submit" class="btn btn-success"><i class="ti-money"></i> Pay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php
include("footer.php");
?>