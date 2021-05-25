<?php
include("../inc/connect.php");
$fetch = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM mlm_settings WHERE id = '1'"));
$secret_key = $fetch['smeplug_secret_key'];

$bank_name = $_POST['bank_name'];
$acc_number = $_POST['acc_number'];



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://smeplug.ng/api/v1/transfer/resolveaccount',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
	"bank_code": "'.$bank_name.'",
	"account_number": "'.$acc_number.'"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: bearer '.$secret_key
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
$res = json_decode($response, true);
echo $res['name'];
exit();