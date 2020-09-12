<?php
session_start();
$ut = $_SESSION["usertype"];

if ($ut == "super") {
include("db/connect.php");

// now lets gos
$id = $_POST["id"];
$i_n = preg_replace('/[^\w]/', ' ', $_POST["int_name"]);
$i_c = preg_replace('/[^\w]/', ' ', $_POST["int_city"]);
$i_s = preg_replace('/[^\w]/', ' ', $_POST["int_state"]);
$i_country = preg_replace('/[^\w]/', ' ', $_POST["int_country"]);
$i_z = preg_replace('/[^\w]/', ' ', $_POST["int_zip"]);
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
// echo $response;
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
    // create
    $update_sql = mysqli_query($connection, "UPDATE `institution` SET name = '$i_n', country = '$i_country', state = '$i_s', city = '$i_c', zip = '$i_z', lnglat = '$co_or' WHERE id = '$id'");
    // done
    if ($update_sql) {
        // echo correct
        $_SESSION["Lack_of_intfund_$randms"] = "Creation Successful";
        echo "sucess";
        $URL="../ams/user_management.php";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    } else {
        // echo bad data
        $_SESSION["Lack_of_intfund_$randms"] = "Creation Error";
        echo "insert error";
        $URL="../ams/user_management.php";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
} else {
    // output a not permitted
    echo "NOT PERMITTED";
}
?>