<?php include("inc/head.php");

$user_type = $_SESSION['user_type'];
if($user_type != "admin"){
    // echo'
    //     <script>window.location ="profile"; </script>
    // ';
    header('location:profile');
}
$user_id = $_SESSION['user_id'];

// $fetch = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE user_id = '$user_id'"));


// $activation = $fetch['activation'];
// if($activation == 0){
//     echo'
//         <script>alert("Activation fee is required to continue"); window.location ="payment.php"; </script>
//     ';
//     // header('location:payment.php');
// }
// $fetch11 = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM mlm_settings WHERE id = '1'"));


// $public_keys = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM mlm_settings WHERE id = '1'"));

// $public_key = $public_keys['flutterwave_public_key'];

// $minimum_withdrawal = $fetch11['minimum_withdrawal'];

?>

<?php include("inc/header.php");?>

  <!-- Left side column. contains the logo and sidebar -->
 <?php include("inc/sidebar.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>window.alert = function() {};</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->  
	
		<!-- Main content -->
		<section class="content">
            <div class="row">
                <div class="col-12 col-lg-6">
                  <div class="box">
                    <div class="box-body">
                        <h3 style="color:blue;">MLM Settings</h3>
                        <form action="" method="POST" onsubmit="document.getElementById('pay1').innerHTML = 'Processing...';">
                          <div class="form-body">
                              <div class="row">
                                  <?php
                                      if(isset($_POST['submit_mlm_settings'])){
                                        $flutterwave_public_key = mysqli_real_escape_string($database,$_POST['flutterwave_public_key']);
                                        $flutterwave_secret_key = mysqli_real_escape_string($database,$_POST['flutterwave_secret_key']);
                                        $fluuterwave_enc_code = mysqli_real_escape_string($database,$_POST['fluuterwave_enc_code']);
                                        $smeplug_public_key = mysqli_real_escape_string($database,$_POST['smeplug_public_key']);
                                        $smeplug_secret_key = mysqli_real_escape_string($database,$_POST['smeplug_secret_key']);
                                        $minimum_withdrawal = mysqli_real_escape_string($database,$_POST['minimum_withdrawal']);
                                        $referal_bonus = mysqli_real_escape_string($database,$_POST['referal_bonus']);
                                        $withdrawal_charge = mysqli_real_escape_string($database,$_POST['withdrawal_charge']);
                                        
                                      
                                      $upds=  mysqli_query($database, "  UPDATE `mlm_settings` SET 
                                        `flutterwave_public_key` = '$flutterwave_public_key',
                                        `flutterwave_secret_key` = '$flutterwave_secret_key',
                                        `fluuterwave_enc_code` = '$fluuterwave_enc_code',
                                        `smeplug_public_key` = '$smeplug_public_key',
                                        `smeplug_secret_key` = '$smeplug_secret_key',
                                        `minimum_withdrawal` = '$minimum_withdrawal',
                                        `referal_bonus` = '$referal_bonus',
                                        `withdrawal_charge` = '$withdrawal_charge'
                                        WHERE `id` = '1'; " );
                                        
                                        if($upds){
                                           echo '<div class="alert alert-success">Information updated successfully</div>'; 
                                        }else{
                                            echo '<div class="alert alert-danger">Something went wrong, please retry</div>'; 
                                        }
                                      }
                                    // UPDATE `mlm_fees` SET `id` = '1' WHERE `mlm_fees`.`id` = '5'; 
                                  ?>
                                  <?php 
                                   $fet = mysqli_query($database, "SELECT * FROM mlm_settings ");
                                   $fetch = mysqli_fetch_assoc($fet) 
                                   ?>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">flutterwave public key</label>
                                        <input required="" type="text" value="<?php echo $fetch['flutterwave_public_key']; ?>" name="flutterwave_public_key" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">flutterwave secret key</label>
                                        <input required="" type="text" value="<?php echo $fetch['flutterwave_secret_key']; ?>" name="flutterwave_secret_key" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">flutterwave enc code</label>
                                        <input required="" type="text" value="<?php echo $fetch['fluuterwave_enc_code']; ?>" name="fluuterwave_enc_code" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">smeplug public key</label>
                                        <input required="" type="text" value="<?php echo $fetch['smeplug_public_key']; ?>" name="smeplug_public_key" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">smeplug secret key</label>
                                        <input required="" type="text" value="<?php echo $fetch['smeplug_secret_key']; ?>" name="smeplug_secret_key" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">minimum withdrawal</label>
                                        <input required="" type="text" value="<?php echo $fetch['minimum_withdrawal']; ?>" name="minimum_withdrawal" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">referal bonus</label>
                                        <input required="" type="text" value="<?php echo $fetch['referal_bonus']; ?>" name="referal_bonus" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">withdrawal charge</label>
                                        <input required="" type="text" value="<?php echo $fetch['withdrawal_charge']; ?>" name="withdrawal_charge" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                  
                                  <!--/span-->
                              </div>
                              <!--/row-->
                          </div>
                           
                          <div class="form-group mt-10">
                             <button type="submit" name="submit_mlm_settings" id="pay1" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>	
                 <div class="col-12 col-lg-6">
                  <div class="box">
                    <div class="box-body">
                        <h3 style="color:blue;">MLM Fees</h3>
                        <form action="" method="POST" onsubmit="document.getElementById('pay3').innerHTML = 'Processing...';">
                          <div class="form-body">
                              <div class="row">
                                  <?php
                                      if(isset($_POST['submit_mlm_fee'])){
                                        $level_1_earning = mysqli_real_escape_string($database,$_POST['level_1_earning']);
                                        $level_2_earning = mysqli_real_escape_string($database,$_POST['level_2_earning']);
                                        $level_3_earning = mysqli_real_escape_string($database,$_POST['level_3_earning']);
                                        $level_4_earning = mysqli_real_escape_string($database,$_POST['level_4_earning']);
                                        $level_5_earning = mysqli_real_escape_string($database,$_POST['level_5_earning']);
                                        $level_6_earning = mysqli_real_escape_string($database,$_POST['level_6_earning']);
                                        $activation_fee = mysqli_real_escape_string($database,$_POST['activation_fee']);
                                        
                                      
                                      $upds=  mysqli_query($database, "  UPDATE `mlm_fees` SET 
                                        `level_1_earning` = '$level_1_earning',
                                        `level_2_earning` = '$level_2_earning',
                                        `level_3_earning` = '$level_3_earning',
                                        `level_4_earning` = '$level_4_earning',
                                        `level_5_earning` = '$level_5_earning',
                                        `level_6_earning` = '$level_6_earning',
                                        `activation_fee` = '$activation_fee'
                                        WHERE `id` = '1'; " );
                                        
                                        if($upds){
                                           echo '<div class="alert alert-success">Information updated successfully</div>'; 
                                        }else{
                                            echo '<div class="alert alert-danger">Something went wrong, please retry</div>'; 
                                        }
                                      }
                                    // UPDATE `mlm_fees` SET `id` = '1' WHERE `mlm_fees`.`id` = '5'; 
                                  ?>
                                  <?php 
                                   $fet = mysqli_query($database, "SELECT * FROM mlm_fees ");
                                   $fetch = mysqli_fetch_assoc($fet) 
                                   ?>
                                 
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">level 1 earning</label>
                                        <input required="" type="text" value="<?php echo $fetch['level_1_earning']; ?>" name="level_1_earning" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">level 2 earning</label>
                                        <input required="" type="text" value="<?php echo $fetch['level_2_earning']; ?>" name="level_2_earning" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">level 3 earning</label>
                                        <input required="" type="text" value="<?php echo $fetch['level_3_earning']; ?>" name="level_3_earning" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">level 4 earning</label>
                                        <input required="" type="text" value="<?php echo $fetch['level_4_earning']; ?>" name="level_4_earning" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">level 5 earning</label>
                                        <input required="" type="text" value="<?php echo $fetch['level_5_earning']; ?>" name="level_5_earning" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">level 6 earning</label>
                                        <input required="" type="text" value="<?php echo $fetch['level_6_earning']; ?>" name="level_6_earning" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">activation fee</label>
                                        <input required="" type="text" value="<?php echo $fetch['activation_fee']; ?>" name="activation_fee" id="amount" class="form-control" placeholder="">
                                      </div>
                                  </div>
                                  
                                  <!--/span-->
                              </div>
                              <!--/row-->
                          </div>
                           
                          <div class="form-group mt-10">
                             <button type="submit" name="submit_mlm_fee" id="pay3" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
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