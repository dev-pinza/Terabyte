<?php
$web_title = "Client Transaction";
include("header.php");

if (isset($_GET["id"]) && $_GET["id"] != "")
{
    $client_id = $_GET["id"];
    // query_users
    $query_client = mysqli_query($connection, "SELECT * FROM `users` WHERE id = '$client_id'");
    $v = mysqli_fetch_array($query_client);
    // I WONT
    $client_fullname = $v["fullname"];
    // query account
    $query_account = mysqli_query($connection, "SELECT * FROM `account` WHERE `user_id` = '$client_id'");
    $ax = mysqli_fetch_array($query_account);
    $client_dep_bal = number_format($ax["total_dep"], 2);
    $client_sp_bal = number_format($ax["total_with"], 2);
    $client_wall_bal = number_format($ax["balance_derived"], 2);
?>
<!-- new -->
<div class="page-content container-fluid">
<div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card" style="background-color: #ff8943;">
                            <div class="card-body">
                                <div id="myCarousel22" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item flex-column active">
                                            <div class="d-flex no-block al mr-3ign-items-center">
                                                <i class="cc EOS-alt text-white display-6 mr-3" title="EOS"></i>
                                                <div class="mt-2">
                                                    <h5 class="text-white font-medium">TERA CLIENT WALLET BALANCE</h5>
                                                    <h6 class="text-white"><?php echo $client_fullname; ?></h6>
                                                </div>
                                                <div class="ml-auto mt-3">
                                                    <div class="crypto"></div>
                                                </div>
                                            </div>
                                            <div class="row text-center text-white mt-4">
                                                <div class="col-4">
                                                    <span class="font-14">Total Deposit</span>
                                                    <p class="font-medium"><i class="fa fa-arrow-up"></i> &#8358; <?php echo $client_dep_bal; ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <span class="font-14">Current Balance</span>
                                                    <p class="font-medium"><i class="ti-wallet"></i> &#8358; <?php echo $client_wall_bal; ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <span class="font-14">Total Spent</span>
                                                    <p class="font-medium"><i class="fa fa-arrow-down"></i> &#8358; <?php echo $client_sp_bal; ?></p>
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
                                <h4 class="card-title">Client Wallet Transaction Details</h4>
                                <h5 class="card-subtitle">View Your Transaction details </h5>
                                <div class="table-responsive">
                                <table class="tablesaw table-bordered table-hover table no-wrap" data-tablesaw-mode="swipe"
                                    data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap
                                    data-tablesaw-mode-switch>
                                    <thead>
                                    <?php
                        $query1 = "SELECT * FROM `acct_transaction` WHERE `user_id` = '$client_id' ORDER BY id ASC";
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
                                        <!-- holla -->
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
                    <!-- END -->
                    <div class="col-12">
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Client Ad Transaction Details</h4>
                                <h5 class="card-subtitle">View Your Transaction details </h5>
                                <div class="table-responsive">
                                <table class="tablesaw table-bordered table-hover table no-wrap" data-tablesaw-mode="swipe"
                                    data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap
                                    data-tablesaw-mode-switch>
                                    <thead>
                                    <?php
                        $query1 = "SELECT * FROM `ad_transaction` WHERE `client_id` = '$client_id' ORDER BY id ASC";
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (mysqli_num_rows($result1) > 0) {
                        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {?>
                                        <tr>
                                            <td><?php echo $row1["transaction_type"]; ?></td>
                                            <td class="title"><?php echo $row1["created_date"]; ?></td>
                                            <td><?php echo number_format($row1["credit"], 2); ?></td>
                                            <td><?php echo number_format($row1["debit"], 2); ?></td>
                                        </tr>
                                        <?php }
                                          }
                                    else {
                                        ?>
                                        <!-- holla -->
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
                </div>
                <!-- End Row -->
</div>
<!-- end  -->
<?php
} else {
    // GO BACK
    echo '<script type="text/javascript">
    $(document).ready(function(){
     swal.fire({
      type: "error",
      title: "No Client Found",
      text: "Please Select a Client",
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
include("footer.php");
?>