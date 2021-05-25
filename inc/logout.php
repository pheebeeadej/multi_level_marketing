<?php 
session_start();
session_unset();
session_destroy();


$hour = time() - 3600 *24 * 30;
setcookie('pwd', "", $hour,'/');
setcookie('username', "", $hour,'/');
setcookie('user_type', "", $hour,'/');
setcookie('user_id', "", $hour,'/');


header("location: ../index.php");


 ?>