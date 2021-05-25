<?php include("inc/head.php");
$user_id = $_SESSION['user_id'];
$fetch = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE user_id = '$user_id'"));

$username = $fetch['username'];
$activation = $fetch['activation'];
if($activation == 0){
    echo'
        <script>alert("Activation fee is required to continue"); window.location ="payment"; </script>
    ';
    // header('location:payment.php');
}
?>
<!-- body start and heder column.  -->
<?php include("inc/header.php");
?>

  <!-- Left side column. contains the logo and sidebar -->
 <?php include("inc/sidebar.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->  
		
		<!-- Main content -->
		<section class="content p-sm-0">
			
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">Hi! <strong style="text-decoration: underline;"><?php echo $_SESSION['username'];?></strong> </h4>
						
						</div>
						<div class="box-body p-4 p-xs-1">
							<div class="row align-items-center">
								<div class="col-xxl-6 col-12">
									<div class="d-md-flex d-block justify-content-between mb-xxl-0 mb-30">
									    	<div class="text-center">
											<h5 class="" style="color:blue;">Your matrix position :</h5>
											<h3 class="my-10">
												<span>Level: <?php echo $fetch['level']?></span>
											</h3>
											<div class="mt-5 mb-10">
												<a class="btn btn-outline btn-secondary btn-md" href="explanation"><span>Learn More about M.L.M</span><i class="ti-arrow-right ml-15"></i></a>
											</div>
										</div>
										<div class="text-center">
											<h5 class="" style="color:blue;">Available Balance:</h5>
											<h3 class="my-10">
												<span>₦<?php echo number_format($fetch['earnings'])?></span>
											</h3>
											<div class="mt-5 mb-10">
												<a class="btn btn-outline btn-primary btn-md" href="transaction"><span>View transactions History</span><i class="ti-arrow-right ml-15"></i></a>
											</div>
										</div>
									
										<div class="text-center"> 
											<h5 class="" style="color:blue;">Total Withdrawal:</h5>
											<h3 class="my-10">
												<span>₦<?php
												$fetchwith = mysqli_fetch_assoc(mysqli_query($database,"SELECT SUM(amount) FROM mlm_notification WHERE username = '$username'AND type = 'wallet_transfer' OR type = 'withdrawal'"));
												echo $fetchwith['SUM(amount)']?></span>
											</h3>
											<div class="mt-5 mb-10">
												<!--<a class="btn btn-outline btn-secondary btn-md" href="explanation"><span>Learn More about M.L.M</span><i class="ti-arrow-right ml-15"></i></a>-->
											</div>
										</div>
										
									</div>
								</div>
								<div class="col-xxl-6 col-12 mb-5 pl-6 ml-5">
								    <div class="row mb-5">
								        <hr>
								        <div class="col-lg-4 bg-success p-5 mb-5 mr-lg-3" style="border-radius:10px;">
								            <h5 class="" style="color:white;">Your Direct Referrals:</h5>
								            	<h3 class="my-10">
    												<span><?php 
    												$fetchref = mysqli_num_rows(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE referrer = '$username'"));
    												echo $fetchref;
    												?></span>
    											</h3>
    										<h5 class="" style="color:white;">link: <a href="https://pay.mayolad.com/ref/<?php echo $_SESSION['username'];?>" style="color:blue;" >https://pay.mayolad.com/ref/<?php echo $_SESSION['username'];?></a></h5>
								            
								        	<button address="https://pay.mayolad.com/ref/<?php echo $_SESSION['username'];?>" class="copyToClipboard btn btn-outline btn-primary btn-md"><span>Copy Link</span></button>
										<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

										<script>
										    $('.copyToClipboard').click(function () {
                                                let str = $(this).attr('address');
                                                const el = document.createElement('textarea');
                                                el.value = str;
                                                el.setAttribute('readonly', '');
                                                el.style.position = 'absolute';
                                                el.style.left = '-9999px';
                                                document.body.appendChild(el);
                                                el.select();
                                                document.execCommand('copy');
                                                document.body.removeChild(el);
                                                
                                                $('.copyToClipboard').text('copied');
                                                setTimeout(function(){ 
                                                   $('.copyToClipboard').text('Copy Link');
                                                    
                                                }, 3000);
                                                
                                            })
										</script>
								        </div>
								        <div class="col-lg-4 bg-primary p-5 mb-5 mt-5 mr-lg-3" style="border-radius:10px;">
								            <h5 class="" style="color:white;">Referral Bonus</h5>
								            	<h3 class="my-10">
    												<span>₦<?php echo number_format($fetch['referral_bonus'])?></span>
    											</h3>
    											<a class="btn btn-primary btn-md" style="background-color:lightblue;" href="referal"><span>Send referral bonus to wallet or earnings</span><i class="ti-arrow-right ml-15"></i></a>
											
								        </div>
								         <div class="col-lg-3 bg-success p-5 mb-5 mt-5 mr-lg-3" style="border-radius:10px;">
								            <h5 class="" style="color:white;">would you like to buy our VTU services</h5>
								            
    										<a class="btn btn-primary btn-md" style="background-color:lightblue;" href="https://pay.mayolad.com/dashboard/"><span>Click here to buy our services</span><i class="ti-arrow-right ml-15"></i></a>
											
								        </div>
								    </div>
								</div>
								<div class="col-xxl-6 col-12 mt-10">
								    <br><br>
								    <hr>
									<h4 style="color:blue;">From Admin</h4>
										<p>Are you a new member accessing this platform for the first time and need more enlightenment on how the system works <a href="https://wa.me/2348168316414 " style="color: red;">Whatsapp</a> or call <span style="color:green;">08168316414</span>.</p>
										
								</div>
								<div class="col-xxl-6 col-12 p-1">
									<div class="callout callout-primary mb-0">
										<h4>Your Matrix Downlines</h4>
									<div class="box p-0">
                                    <div class="box-body p-0">
                                        <div class="table-responsive">
                                          <div id="example5_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 p-0">
                                            
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="example5" class="table table-bordered table-striped dataTable" style="width: 100%;" role="grid" aria-describedby="example5_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example5" rowspan="1" colspan="1"  style="width: 5px;">S/N</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example5" rowspan="1" colspan="1"  style="width: 20px;">Username</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" style="width: 5px;">Level</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" style="width: 20px;">Downlines</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" style="width: 20px;">Referred By</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd bg-info" style="" id="level_1">
                                                                    <td>Level 1:</td>
                                                            </tr>
                                                            <script>
                                                                $(function(){
                                                                    $('#level_1').click(function(){
                                                                        $('.lvl_1').toggle();
                                                                        // alert("");
                                                                    });
                                                                });
                                                            </script>
                                                        <?php
                                                        
                                                            $fet = mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$username' ");
                                                            
                                                            if(mysqli_num_rows($fet) >0){
                                                                $sn = 1;
                                                                $level_1_count = 1;
                                                                $level_1_people = array();
                                                                while( $fetch = mysqli_fetch_assoc($fet) ){
                                                                   $pikin =$fetch["username"];
                                                                   $downlines = mysqli_num_rows(mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$pikin' "));
                                                                   
                                                                   
                                                                   array_push($level_1_people,$fetch["username"]);
                                                                 echo '
                                                                    <tr role="row" class="odd">
                                                                        <td class="lvl_1" style="display:none;">'.$sn.'</td>
                                                                        <td  class="lvl_1" style="display:none;">'.$fetch["username"].'</td>
                                                                        <td class="lvl_1" style="display:none;">'.$fetch["level"].'</td>
                                                                        <td  class="lvl_1" style="display:none;">'.$downlines.'</td>
                                                                        <td class="lvl_1" style="display:none;"></td>
                                                                       
                                                                       
                                                                    </tr>
                                                                      ';
                                                                      $sn+=1;
                                                                 $level_1_count+=1;
                                                                }
                                                            }
                                                        ?>
                                                        <!--level 2///////////////////////////////////////////////-->
                                                        <?php  
                                                         $counting = count($level_1_people);
                                                        if($counting > 0){?>
                                                        
                                                                <tr role="row" class="odd bg-info mt-5" style=""  id="level_2">
                                                                    <td>Level 2:</td>
                                                                </tr>
                                                               
                                                            <script>
                                                                $(function(){
                                                                    $('#level_2').click(function(){
                                                                        $('.lvl_2').toggle();
                                                                        // alert("");
                                                                    });
                                                                });
                                                            </script>
                                                                 <?php
                                                                      $i = 0;
                                                                       $sn = 1;
                                                                  while ($i < $counting){
                                                                      $user = $level_1_people[$i];
                                                                       
                                                                       
                                                                      
                                                                         //   fetch out from databse
                                                                          $fet = mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$user' ");
                                                
                                                                            if(mysqli_num_rows($fet) >0){
                                                                                $level_2_count = 1;
                                                                                $level_2_people = array();
                                                                                while( $fetch = mysqli_fetch_assoc($fet) ){
                                                                                $pikin =$fetch["username"];
                                                                                $downlines = mysqli_num_rows(mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$pikin' "));
                                                                   
                                                                                   array_push($level_2_people,$fetch["username"]);
                                                                                 echo '
                                                                                    <tr role="row" class="odd">
                                                                                         <td  class="lvl_2" style="display:none;">'.$sn.'</td>
                                                                                        <td  class="lvl_2" style="display:none;">'.$fetch["username"].'</td>
                                                                                        <td class="lvl_2" style="display:none;">'.$fetch["level"].'</td>
                                                                                         <td  class="lvl_2" style="display:none;">'.$downlines.'</td>
                                                                                         <td class="lvl_2" style="display:none;">'.$user.'</td>
                                                                                       
                                                                                    </tr>
                                                                                      ';
                                                                                  $sn+=1;
                                                                                 $level_2_count+=1;
                                                                                }
                                                                            }
                                                                    
                                                                        $i++;
                                                                    }
                                                                //  using array to fetch out this one but i have not declared or insert into the array
                                                                ?>
                                                                
                                                        <?php }?>
                                                         <!--end level 2///////////////////////////////////////////////-->
                                                         
                                                         <!--level 3///////////////////////////////////////////////-->
                                                        <?php  
                                                         $counting = count($level_2_people);
                                                        if($counting > 0){?>
                                                        
                                                                <tr role="row" class="odd bg-info mt-5" style="" id="level_3">
                                                                    <td>Level 3:</td>
                                                                </tr>
                                                                <script>
                                                                    $(function(){
                                                                        $('#level_3').click(function(){
                                                                            $('.lvl_3').toggle();
                                                                            // alert("");
                                                                        });
                                                                    });
                                                                </script>
                                                                 <?php
                                                                      $i = 0;
                                                                       $sn = 1;
                                                                  while ($i < $counting){
                                                                      $user = $level_2_people[$i];
                                                                      
                                                                         //   fetch out from databse
                                                                          $fet = mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$user' ");
                                                
                                                                            if(mysqli_num_rows($fet) >0){
                                                                                $level_3_count = 1;
                                                                                $level_3_people = array();
                                                                                while( $fetch = mysqli_fetch_assoc($fet) ){
                                                                                    $pikin =$fetch["username"];
                                                                                $downlines = mysqli_num_rows(mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$pikin' "));
                                                                   
                                                                                   array_push($level_3_people,$fetch["username"]);
                                                                                 echo '
                                                                                    <tr role="row" class="odd">
                                                                                         <td  class="lvl_3" style="display:none;">'.$sn.'</td>
                                                                                        <td  class="lvl_3" style="display:none;">'.$fetch["username"].'</td>
                                                                                        <td class="lvl_3" style="display:none;">'.$fetch["level"].'</td>
                                                                                         <td class="lvl_3" style="display:none;">'.$downlines.'</td>
                                                                                        <td class="lvl_3" style="display:none;">'.$user.'</td>
                                                                                       
                                                                                    </tr>
                                                                                      ';
                                                                                  $sn+=1;
                                                                                 $level_3_count+=1;
                                                                                }
                                                                            }
                                                                    
                                                                        $i++;
                                                                    }
                                                               
                                                                ?>
                                                                
                                                        <?php }?>
                                                         <!--end level 3///////////////////////////////////////////////-->
                                                         
                                                         
                                                         
                                                           <!--level 4///////////////////////////////////////////////-->
                                                        <?php  
                                                         $counting = count($level_3_people);
                                                        if($counting > 0){?>
                                                        
                                                                <tr role="row" class="odd bg-info mt-5" style="" id="level_4">
                                                                    <td>Level 4:</td>
                                                                </tr>
                                                                 <script>
                                                                    $(function(){
                                                                        $('#level_4').click(function(){
                                                                            $('.lvl_4').toggle();
                                                                            // alert("");
                                                                        });
                                                                    });
                                                                </script>
                                                                 <?php
                                                                      $i = 0;
                                                                       $sn = 1;
                                                                  while ($i < $counting){
                                                                      $user = $level_3_people[$i];
                                                                                  
                                                                         //   fetch out from databse
                                                                          $fet = mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$user' ");
                                                
                                                                            if(mysqli_num_rows($fet) >0){
                                                                                $level_4_count = 1;
                                                                                $level_4_people = array();
                                                                                while( $fetch = mysqli_fetch_assoc($fet) ){
                                                                                    $pikin =$fetch["username"];
                                                                                $downlines = mysqli_num_rows(mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$pikin' "));
                                                                   
                                                                                   array_push($level_4_people,$fetch["username"]);
                                                                                 echo '
                                                                                    <tr role="row" class="odd">
                                                                                        <td  class="lvl_4" style="display:none;">'.$sn.'</td>
                                                                                        <td  class="lvl_4" style="display:none;">'.$fetch["username"].'</td>
                                                                                        <td class="lvl_4" style="display:none;">'.$fetch["level"].'</td>
                                                                                        <td  class="lvl_4" style="display:none;">'.$downlines.'</td>
                                                                                        <td class="lvl_4" style="display:none;">'.$user.'</td>
                                                                                       
                                                                                    </tr>
                                                                                      ';
                                                                                  $sn+=1;
                                                                                 $level_4_count+=1;
                                                                                }
                                                                            }
                                                                        $i++;
                                                                    }
                                                              
                                                                ?>
                                                                
                                                        <?php }?>
                                                         <!--end level 4///////////////////////////////////////////////-->
                                                         
                                                         
                                                             <!--level 5///////////////////////////////////////////////-->
                                                        <?php  
                                                         $counting = count($level_4_people);
                                                        if($counting > 0){?>
                                                        
                                                                <tr role="row" class="odd bg-info mt-5" style="" id="level_5">
                                                                    <td>Level 5:</td>
                                                                </tr>
                                                                 <script>
                                                                    $(function(){
                                                                        $('#level_5').click(function(){
                                                                            $('.lvl_5').toggle();
                                                                            // alert("");
                                                                        });
                                                                    });
                                                                </script>
                                                                 <?php
                                                                      $i = 0;
                                                                       $sn = 1;
                                                                  while ($i < $counting){
                                                                      $user = $level_4_people[$i];
                                                                      
                                                                       //   fetch out from databse
                                                                          $fet = mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$user' ");
                                                
                                                                            if(mysqli_num_rows($fet) >0){
                                                                                $level_5_count = 1;
                                                                                $level_5_people = array();
                                                                                while( $fetch = mysqli_fetch_assoc($fet) ){
                                                                                    $pikin =$fetch["username"];
                                                                                $downlines = mysqli_num_rows(mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$pikin' "));
                                                                   
                                                                                   array_push($level_5_people,$fetch["username"]);
                                                                                 echo '
                                                                                    <tr role="row" class="odd">
                                                                                     <td  class="lvl_5" style="display:none;">'.$sn.'</td>
                                                                                        <td  class="lvl_5" style="display:none;">'.$fetch["username"].'</td>
                                                                                        <td class="lvl_5" style="display:none;">'.$fetch["level"].'</td>
                                                                                        <td  class="lvl_5" style="display:none;">'.$downlines.'</td>
                                                                                        <td class="lvl_5" style="display:none;">'.$user.'</td>
                                                                                       
                                                                                    </tr>
                                                                                      ';
                                                                                  $sn+=1;
                                                                                 $level_5_count+=1;
                                                                                }
                                                                            }
                                                                        $i++;
                                                                    }
                                                              
                                                                ?>
                                                                
                                                        <?php }?>
                                                         <!--end level 5///////////////////////////////////////////////-->
                                                         
                                                         
                                                              <!--level 6///////////////////////////////////////////////-->
                                                        <?php  
                                                         $counting = count($level_5_people);
                                                        if($counting > 0){?>
                                                        
                                                                <tr role="row" class="odd bg-info mt-5" style="" id="level_6">
                                                                    <td>Level 6:</td>
                                                                </tr>
                                                                 <script>
                                                                    $(function(){
                                                                        $('#level_6').click(function(){
                                                                            $('.lvl_6').toggle();
                                                                            // alert("");
                                                                        });
                                                                    });
                                                                </script>
                                                                 <?php
                                                                      $i = 0;
                                                                       $sn = 1;
                                                                  while ($i < $counting){
                                                                        $user = $level_5_people[$i];
                                                                      
                                                                         //   fetch out from databse
                                                                          $fet = mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$user' ");
                                                                         
                                                                         
                                                                            if(mysqli_num_rows($fet) >0){
                                                                                $level_6_count = 1;
                                                                                $level_6_people = array();
                                                                                while( $fetch = mysqli_fetch_assoc($fet) ){
                                                                                    $pikin =$fetch["username"];
                                                                                $downlines = mysqli_num_rows(mysqli_query($database, "SELECT * FROM accounts_mlm WHERE ancestor = '$pikin' "));
                                                                   
                                                                                   array_push($level_6_people,$fetch["username"]);
                                                                                 echo '
                                                                                    <tr role="row" class="odd">
                                                                                        <td  class="lvl_6" style="display:none;">'.$sn.'</td>
                                                                                        <td  class="lvl_6" style="display:none;">'.$fetch["username"].'</td>
                                                                                        <td class="lvl_6" style="display:none;">'.$fetch["level"].'</td>
                                                                                        <td  class="lvl_6" style="display:none;">'.$downlines.'</td>
                                                                                        <td class="lvl_6" style="display:none;">'.$user.'</td>
                                                                                       
                                                                                    </tr>
                                                                                      ';
                                                                                  $sn+=1;
                                                                                 $level_6_count+=1;
                                                                                }
                                                                            }
                                                                        $i++;
                                                                    }
                                                              
                                                                ?>
                                                                
                                                        <?php }?>
                                                         <!--end level 6///////////////////////////////////////////////-->
                                                         
                                                         
                                                        </tbody>
                                                       
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 text-center">
				    <a href="transfer_earning">
					<div class="info-box">
					  <img src="images/airtimetopup.svg" alt="" style="height: 100px;">
					  <h4 class=""><strong>Earnings To Wallet</strong></h4>
					  <p>This Withdrawal option allow you to transfer part of your earnings straight to your m-connect VTU wallet from where you can use it to purchase mobile data, airtime and all others</p>
					</div>
					</a>
					<!-- /.info-box -->
				</div>
				
				<div class="col-xl-4 text-center">
				   	<a href="withdraw">
					<div class="info-box">
					  <img src="images/airtime2cash.jpg" alt="" style="height: 100px;">
					  <h4 class=""><strong>Withdraw Cash</strong></h4>
					  <p>This Withdrawal option allow you to withdraw your earnings directly to your bank account with instant delivery (unless any delay from your bank)</p>
					</div>
					</a>
					<!-- /.info-box -->
				</div>
				
			</div>	
			</div>
		
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
	
 <?php include("inc/footer.php");
?>
