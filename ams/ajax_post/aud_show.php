<?php
include("../../function/db/connect.php");
$c_id = $_POST["c_id"];
$int_id = $_POST["int_id"];
$date = date('Y-m-d');
if ($int_id != "" && $c_id != "")
{
    $get_cache = mysqli_query($connection, "SELECT * FROM `institution`");
    $rowx = mysqli_fetch_array($get_cache);
        $int_name = $rowx["name"];
    $sel_c = mysqli_query($connection, "SELECT * FROM adu_cache WHERE int_id = '$int_id' AND cache_id = '$c_id' LIMIT 1");
    $cui = mysqli_num_rows($sel_c);
    if ($cui <= 0) {
        $push_sql = mysqli_query($connection, "INSERT INTO `adu_cache` (`cache_id`, `int_id`, `aud_name`, `date`) VALUES ('{$c_id}', '{$int_id}', '{$int_name}', '{$date}')");
    if ($push_sql) {
        $query = "SELECT * FROM `adu_cache` WHERE cache_id = '$c_id'";
        $result = mysqli_query($connection, $query);
        ?>
        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle">Audience</h6>
                                <table data-toggle="table" data-height="250" data-mobile-responsive="true"
                                    class="table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <!-- <th>Location</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
                                        <tr id="tr-id-1" class="tr-class-1">
                                            <?php 
                                            $int_id = $row["int_id"];
                                            $get_int = mysqli_query($connection, "SELECT * FROM `institution` WHERE id = '$int_id'"); 
                                            $pi = mysqli_fetch_array($get_int);
                                            $int_n = $pi["name"];
                                            // $state = $pi["state"];
                                            ?>
                                            <td id="td-id-1" class="td-class-1"> <?php echo $int_n; ?> </td>
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
        <?php
    }
} else {
    $query = "SELECT * FROM `adu_cache` WHERE cache_id = '$c_id'";
    $result = mysqli_query($connection, $query);
    ?>
    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle">Audience</h6>
                            <table data-toggle="table" data-height="250" data-mobile-responsive="true"
                                class="table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <!-- <th>Location</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
                                    <tr id="tr-id-1" class="tr-class-1">
                                        <?php 
                                        $int_id = $row["int_id"];
                                        $get_int = mysqli_query($connection, "SELECT * FROM `institution` WHERE id = '$int_id'"); 
                                        $pi = mysqli_fetch_array($get_int);
                                        $int_n = $pi["name"];
                                        // $state = $pi["state"];
                                        ?>
                                        <td id="td-id-1" class="td-class-1"> <?php echo $int_n; ?> </td>
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
    <?php
}
}
?>