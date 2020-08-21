<?php
$ut = $_POST["ut"];
if ($ut != "") {
    include("../../function/db/connect.php");
    function fill_int($connection) {
        $org = "SELECT * FROM `institution` WHERE active = '1'";
        $res = mysqli_query($connection, $org);
        $out = '';
        while ($row = mysqli_fetch_array($res))
        {
          $out .= '<option value="'.$row["id"].'">'.strtoupper($row["name"])." - ".strtoupper($row["state"]).'</option>';
        }
        return $out;
      }
if ($ut == "man") {
    ?>
    <label for="">Institution</label>
    <div class="input-group mb-3">
    <button type="button" class="btn btn-info"><i
    class="ti-home text-white"></i></button>
    <select class="form-control" name="int_id">
    <?php echo fill_int($connection); ?>
    </select>
    <span>...</span>
    <div class="custom-control custom-checkbox mr-sm-2">
            <input type="checkbox" class="custom-control-input" name="check_me" id="checkbox12" value="1">
            <label class="custom-control-label" for="checkbox12">Key Manager</label>
        </div>
    </div>
    <div class="form-group">
       
    </div>
    <?php
} else if ($ut == "rep") {
    ?>
    <label for="">Rep Institution</label>
    <div class="input-group mb-3">
    <button type="button" class="btn btn-info"><i
    class="ti-home text-white"></i></button>
    <select class="form-control" name="int_id">
    <?php echo fill_int($connection); ?>
    </select>
    </div>
    <label for="">Matric Number</label>
    <div class="input-group mb-3">
    <button type="button" class="btn btn-info"><i
    class="ti-home text-white"></i></button>
    <input type="text" class="form-control" name="matric" required>
    </div>
    <?php
}
} else {
    echo "NOTHING";
}
?>