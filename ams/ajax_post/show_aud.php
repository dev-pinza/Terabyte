<?php
include("../../function/db/connect.php");
// che
$display2 = '';
$c_id = $_POST['c_id'];
$don = "";

if ($c_id != "") {
    $don = "SELECT * FROM `adu_cache` WHERE cache_id = '$c_id' ORDER BY id DESC";
        $result = mysqli_query($connection, $don);
        if (mysqli_num_rows($result) >= 1) {
        while ($pox = mysqli_fetch_array($result)) {
            $int_id = $pox["int_id"];
            $get_cache = mysqli_query($connection, "SELECT * FROM `institution` WHERE id = '$int_id'");
    $rowx = mysqli_fetch_array($get_cache);
        $int_name = $rowx["name"];
            $display2 = '
            <tr>
            <td>'.$int_name.'</td>
            <td></td>
            <td></td>
            <td><a id="int_del_'.$pox["id"].'" data-aud-id="'.$pox["id"].'" class="btn btn-danger" style="color:white;">delete</a></td>
            </tr>
            ';
            echo $display2;
            ?>
            <script>
 $(document).ready(function() {
    $('#int_del_<?php echo $pox["id"];?>').on("click", function(){
        var id = $(this).data("aud-id");
        $.ajax({
           url:"ajax_post/delete_aud.php",
           method:"POST",
           data:{id:id},
           success:function(data){
             $('#done_delete').html(data);
           }
      });
    });
 });
</script>
            <?php
        }
    } else {
        $display2 = '
        <tr>
        <td>All Institution</td>
        </tr>
        ';
        echo $display2;

    }
}
?>
