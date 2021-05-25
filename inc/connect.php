<?php
session_start();
date_default_timezone_set("Africa/Lagos");
$database= mysqli_connect('localhost', 'mayocnlm_pheebee', 'toheeb61236630', 'mayocnlm_app');

if(!$database){
    die("Could not connect to mysql".mysqli_error($database));
}
// if(!(isset($_SESSION['username']))){
//     header("location: index.php");
// }