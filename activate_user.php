<?php
include("inc/connect.php");
$user_type = $_SESSION['user_type'];

if($user_type != "admin"){
    
    header('location:profile');
}

if( isset($_GET['k']) ){
    
            $k = $_GET['k'];
            
            $upds= mysqli_query($database, "UPDATE `accounts_mlm` SET `activation` = '1' WHERE `id` = '$k'; " );
                                            
            if($upds){
               echo '<script>alert("Account activated successfuly");window.location = "admin_not_exclusively_found1";</script>'; 
            }else{
                 echo '<script>alert("Something went wrong, please retry");</script>'; 
              
            }
                                            
}else{
     echo'<script>window.location = "admin_not_exclusively_found1"</script>';
}

