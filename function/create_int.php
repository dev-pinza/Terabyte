<?php
session_start();
$ut = $_SESSION["usertype"];

if ($ut == "super") {
include("db/connect.php");

// now lets gos
$i_n = $_POST["int_name"];
$i_c = $_POST["int_city"];
$i_s = $_POST["int_state"];
$i_country = $_POST["int_country"];
$i_z = $_POST["int_zip"];
$gen_date = date('Y-m-d H:i:s');
// check if it is online
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://dev.virtualearth.net/REST/v1/Locations?query=$i_s+$i_country&include=queryParse&key=AmLFC0WKYeG_wyo_MbMPrIqZaIDRljzi561JJ6bMfbAhc3SbkW9Tc8aLsnYjibGO&output=json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
$obj = json_decode($response, TRUE);
$co_or_x = $obj['resourceSets'][0]['resources'][0]['geocodePoints'][0]['coordinates'][0];
$co_or_y = $obj['resourceSets'][0]['resources'][0]['geocodePoints'][0]['coordinates'][1];
$stat = $obj['statusCode'];
if ($stat == "200") {
    $co_or = $co_or_x.",".$co_or_y;
}
echo $co_or = $co_or_x.",".$co_or_y;
// aiit
$digits = 10;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
// alright
$check_sql = mysqli_query($connection, "SELECT * FROM `institution` WHERE name = '$i_n' AND country = '$i_country' AND state = '$i_s' AND zip = '$i_z' AND active = '1'");
$x = mysqli_num_rows($check_sql);
if ($x <= 0) {
    // create
    $insert_sql = mysqli_query($connection, "INSERT INTO `institution` (`name`, `country`, `state`, `city`, `zip`, `date_created`, `population`, `key_manager`, `active`, `lnglat`) VALUES ('{$i_n}', '{$i_country}', '{$i_s}', '{$i_c}', '{$i_z}', '{$gen_date}', '0', NULL, '1', '{$co_or}')");
    // done
    if ($insert_sql) {
        // echo correct
        $_SESSION["Lack_of_intfund_$randms"] = "Creation Successful";
        echo "sucess";
        echo header ("Location: ../ams/user_management.php?message1=$randms");
    } else {
        // echo bad data
        $_SESSION["Lack_of_intfund_$randms"] = "Creation Error";
        echo "insert error";
        echo header ("Location: ../ams/user_management.php?message2=$randms");
    }
} else {
    // go back
    $_SESSION["Lack_of_intfund_$randms"] = "Institution Exist";
        echo header ("Location: ../ams/user_management.php?message1=$randms");
    // echo Institution Exist
}
} else {
    // output a not permitted
    echo "NOT PERMITTED";
}
?>