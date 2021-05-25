<?php include("inc/head.php");

$user_id = $_SESSION['user_id'];
$fetch = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE user_id = '$user_id'"));


$activation = $fetch['activation'];
if($activation == 0){
    echo'
        <script>alert("Activation fee is required to continue"); window.location ="payment.php"; </script>
    ';
    // header('location:payment.php');
}
$fetch11 = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM mlm_settings WHERE id = '1'"));


// $public_keys = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM mlm_settings WHERE id = '1'"));

// $public_key = $public_keys['flutterwave_public_key'];

$minimum_withdrawal = $fetch11['minimum_withdrawal'];

?>
<!-- body start and heder column.  -->
<?php include("inc/header.php");
?>

  <!-- Left side column. contains the logo and sidebar -->
 <?php include("inc/sidebar.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>window.alert = function() {};</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->  
	
		<!-- Main content -->
		<section class="content">
            <div class="row">
                <div class="col-12 col-lg-8">
                  <div class="box">
                      
                    <div class="box-body">
                        <form action="" method="POST" onsubmit="document.getElementById('pay').innerHTML = 'Processing...';">
                            <?php
                            if(isset($_POST['submit'])){
                              if($_POST['amount'] == ""){
                                  echo'<div class="alert alert-danger">Amount is required</div>';
                              }else if($_POST['amount'] < 0){
                                  echo'<div class="alert alert-danger">Invalid amount</div>';
                              }else{
                                $fetch11 = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM mlm_settings WHERE id = '1'"));
                                $minimum_withdrawal = $fetch11['minimum_withdrawal'];
                                
                                // fetch user details
                                $user_id = $_SESSION['user_id'];
                                $fetch = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE user_id = '$user_id'"));
                                $earnings = $fetch['earnings'];
                                $paidname = $fetch['username'];
                                $paidemail  = $fetch['email'];
                                
                                
                                $amount = mysqli_real_escape_string($database,$_POST['amount']);
                                
                                if($amount < $minimum_withdrawal){
                                    
                                  echo'<div class="alert alert-danger">amount is lesser than minimum withdrawal</div>';
                                  
                                }elseif($amount > $earnings){
                                    
                                  echo'<div class="alert alert-danger">insufficient earning balance. Earnings: '.$earnings.'</div>';
                                     
                                }elseif($amount <= $earnings){
                                    // transer to user account in database
                                    $fetchet = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM accounts WHERE username = '$paidname'"));
                                    $bonus_add = $fetchet['wallet'] + $amount;
                                    
                                    $transfer =  mysqli_query($database, "UPDATE accounts SET wallet = '$bonus_add' WHERE username='$paidname'"); 
                                          
                                        
                                        if($transfer){
                                        //   put into transactions in the database
                                        $id= time();
                                        $ref= "W".time()."TRANS";
                                        $date = date("Y/m/d - h:i:sa");
                                        
                                          mysqli_query($database, " INSERT INTO `mlm_notification` (`id`, `username`, `email`, `transactionID`, `transaction_ref`, `status`, `type`,  `amount`, `date`) 
                                            VALUES ('', '$paidname', '$paidemail', '$id', '$ref', 'succesful',  'wallet_transfer', '$amount', '$date');");
                                           
                                        
                                        // subtract fund from user
                                        $bal = $earnings - $amount;
                                        
                                         $upd1 =  mysqli_query($database, "UPDATE accounts_mlm SET earnings = '$bal' WHERE user_id='$user_id'"); 
                                          
                                          echo'<div class="alert alert-success">Withdrwal successfully transfered too your wallet, where you can use it to purchase Data, Airtime and others.</div>';
                                            
                                        // alert and go to profile
                                        }else{
                                           
                                            echo'<div class="alert alert-danger">Something went wrong, please retry</div>';
                                        }
                              }
                                
                              }
                            }
                            ?>
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label style="color:lightgreen;" class="font-weight-700 font-size-16">Note: minimum withdrawal - ₦<?php echo number_format($minimum_withdrawal);?></label>
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">Amount</label>
                                        <input required="" type="number" min="<?php echo $minimum_withdrawal;?>" name="amount" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                  <!--/span-->
                              </div>
                              <!--/row-->
                          </div>
                           
                          <div class="form-group mt-10">
                             <button type="submit" name="submit" id="pay" class="btn btn-primary"> <i class="fa fa-check"></i> Send</button>
                              
                          </div>
                        </form>
                    </div>
                  </div>
                </div>		  
            </div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

  <?php include("inc/footer.php");?>