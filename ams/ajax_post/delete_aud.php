<?php
include("../../function/db/connect.php")
?>
<?php
if ($_POST["id"] != "") {
    $id = $_POST["id"];
    $query_del = mysqli_query($connection, "DELETE FROM `adu_cache` WHERE id = '$id'");
    if ($query_del) {
        echo '<script type="text/javascript">
            toastr.success("Audience Deleted", "Institution Deleted");
        </script>
        ';
    } else {
        echo '<script type="text/javascript">
        toastr.error("Error Deleting", "Audience not Deleted");
    </script>
    ';
    }
} else {
    echo "NO USER";
}
?>