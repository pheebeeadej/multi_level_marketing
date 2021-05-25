<?php include("connect.php");

if(!(isset($_SESSION['username']))){
    
    header("location: index.php");
}
$user_id = $_SESSION['user_id'];
$earnings =mysqli_fetch_assoc( mysqli_query($database,"SELECT * FROM accounts_mlm WHERE user_id = '$user_id'") );
$earnings = $earnings['earnings'];
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <title>M.L.M || Dashboard</title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	
	<!-- Data Table-->
	<link rel="stylesheet" type="text/css" href="assets/vendor_components/datatable/datatables.min.css"/>
	
	<!-- daterange picker -->	
	<link rel="stylesheet" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">	
	
	<!-- theme style -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- CrmX Admin skins -->
	<link rel="stylesheet" href="css/skin_color.css">
     
  </head>
