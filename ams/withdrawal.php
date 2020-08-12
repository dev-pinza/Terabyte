<?php
$web_title = "Withdrawal";
include("header.php");
?>
<!-- a withdawal page -->
<!-- check if the account have upto 100 naira -->
<?php
if ($wall_bal >= 100.00) {
?>
<!-- make  ove -->
<!-- done -->
<?php
} else {

}
?>
<!-- else take out -->
<?php
include("footer.php");
?>