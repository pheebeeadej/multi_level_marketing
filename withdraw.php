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
$withdrawal_charge =  $fetch11['withdrawal_charge'];
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
                        <form action="sme_plug/pay.php" method="POST">
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label style="color:lightgreen;" class="font-weight-700 font-size-16">Minimum withdrawal - ₦<?php echo number_format($minimum_withdrawal);?></label>
                                        <br><label style="color:lightgreen;" class="font-weight-700 font-size-16">withdrawal charge - ₦<?php echo number_format($withdrawal_charge);?></label>
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">Amount</label>
                                        <input required="" type="number" min="<?php echo $minimum_withdrawal;?>" name="amount" id="amount" class="form-control" placeholder="">
                                      </div>
                                       <div class="form-group">
                                        <label class="font-weight-700 font-size-16">Account Number</label>
                                        <input type="phone" maxlength="10" minlength="10" required="" name="acc_number" id="acc_number" class="form-control" placeholder="">
                                      </div>
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">Bank Name</label>
                                        	<select name="bank_name" required="" class="select form-control" id="bank_name">
													<option value="" selected="">------Select bank-------</option>
                                                    <option value="044">Access Bank Nigeria Plc</option>
                                                    <option value="063">Diamond Bank Plc</option>
                                                    <option value="050">Ecobank Nigeria</option>
                                                    <option value="084">Enterprise Bank Plc</option>
                                                    <option value="070">Fidelity Bank Plc</option>
                                                    <option value="011">First Bank of Nigeria Plc</option>
                                                    <option value="214">First City Monument Bank</option>
                                                    <option value="058">Guaranty Trust Bank Plc</option>
                                                    <option value="030">Heritaage Banking Company Ltd</option>
                                                    <option value="301">Jaiz Bank</option>
                                                    <option value="082">Keystone Bank Ltd</option>
                                                    <option value="014">Mainstreet Bank Plc</option>
                                                    <option value="076">Skye Bank Plc</option>
                                                    <option value="039">Stanbic IBTC Plc</option>
                                                    <option value="232">Sterling Bank Plc</option>
                                                    <option value="032">Union Bank Nigeria Plc</option>
                                                    <option value="033">United Bank for Africa Plc</option>
                                                    <option value="215">Unity Bank Plc</option>
                                                    <option value="035">WEMA Bank Plc</option>
                                                    <option value="057">Zenith Bank International </option>
											</select>
                                      </div>
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">Account Name</label>
                                        <input type="text" readonly="" name="acc_name" id="acc_name" class="form-control" placeholder="account name will be displayed here">
                                      </div>
                                     
                                      
                                  </div>
                                  <!--/span-->
                              </div>
                              <!--/row-->
                          </div>
                           <small id="error_msg" style="color:red"></small>
                          <div class="form-group mt-10">
                             <button id="pay" type="button"  class="btn btn-primary"> <i class="fa fa-check"></i> Verify</button>
                              <input id="pay_now" type="submit" style="display:none;" class="btn btn-success" value="Submit">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function(){
    $("#pay").click(function(){
        var amount = $('#amount').val();
         var bank_name = $('#bank_name').val();
          var acc_number = $('#acc_number').val();
         

        if(amount != "" && bank_name != "" && acc_number != ""){
            $("#pay").val("Validating.....");
             $("#error_msg").text("");
             $.ajax({
			   url:'sme_plug/resolve_account.php',
			   method:'POST',
			    data:{
				     bank_name:bank_name, acc_number:acc_number
			    },
			   success:function(data){
					  $("#acc_name").val(data);
					  $("#pay").hide();
					  $("#pay_now").show();
			   }
		    });
            
             
        }else{
            $("#error_msg").text("Please fill all fields."); 
        }
        
    });
});
</script>	
  <?php include("inc/footer.php");
?>