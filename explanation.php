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
		<!--<div class="col-12">-->
  <!--        <div class="box">-->
              
  <!--          <div class="box-body">-->
  <!--              <h5>Please, if you are accessing this page via mobile phone. Switch your browser to <span style="color:blue;font-weight:bold;">"DesktopView"</span>. to view this explanation and pictures better.</h5>-->
  <!--          </div>-->
  <!--        </div>-->
  <!--      </div>-->

		<!-- Main content -->
		<section class="content">
            <div class="row">
                <!--<div class="col-12 col-lg-6">-->
                <!--  <div class="box">-->
                      
                <!--    <div class="box-body" style="background-image:url('images/explan.jpeg');background-size:cover; background:repeat:no repeat;height:400px;">-->
                       
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <!-- <div class="col-12 col-lg-6">-->
                <!--  <div class="box">-->
                      
                <!--    <div class="box-body" style="background-image:url('images/explan1.jpeg');background-size:cover; background:repeat:no repeat;height:400px;">-->
                       
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <center> <iframe width="450" height="250" src="https://www.youtube.com/embed/PLMNOuwjuNs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
			     
			 </iframe> </center>
                    
                  </a>
                </div>
                <div class="col-12">
                  <div class="box">
                    <div class="box-body">
                        <center> <h3 style="color:blue;font-weight:bold;">WHAT IS MAYOLAD CONNECT?</h3> </center>
                        <p>
                            MAYOLAD CONNECT (M-CONNECT) is a company offering telecom services all at a cheaper rate for resellers to make more profits using a multi-level marketing system that allows you to earn massive income by inviting people to the platform.<br><br>

                              Many people look for different ways to earn extra income, which explains why MAYOLAD CONNECT is a viable and increasingly common online earning technique for some Nigerians.<br><br>
                        
                              In as much the desire to accumulate extra cash keeps rising with each passing day, it is extremely important to ensure that the method used is legit and sustainable. Online options continue to
                              be some of the most favoured avenues of making money today and the best of it is a multi-level marketing system because you keep earning forever and even while you stop working, you only need to work once and keep earning forever.<br><br>
                        
                              But how does MAYOLAD CONNECT work? Is it even beneficial? How can I earn on M-CONNECT platform?<br><br>
                        </p>
                         M-connect is an already existing VTU/Telecome Website which as been functioning since 2019 and which we just added the New MLM program that allows you to earn from your donwlines 
                         deep down to 6th generation. The two programs are now running concurrently on one platform, which means you can decide to withdraw your earnings on MLM directly to your bank account with instant
                         reflection or use it to purchase data and other services in VTU. <br><br>
                        <p>
                             <center><h2><strong><font color="blue">THREE DIFFERENT WAYS TO EARN ON M-CONNECT</font></strong></h2> </center><br>
                            <h5><strong>1. RE-SELLING OUR SERVICES</strong></h5><br>
                            MAYOLAD CONNECT as provided the following services all at a very cheap rate (resellers’ rate) for you to resell and make huge profits.<br>
                             <strong>SERVICES AVAILABLE ON MAYOLAD CONNECT INCLUDE:</strong><br>
                                1. Mobile data of all networks.<br>
                                2. Airtime of all networks.<br>
                                3. TV subscriptions.<br>
                                4. Bulk SMS.<br>
                                5. Electricity bills.<br>
                                6. Recharge Card e-pin.<br>
                                7. Airtime to cash.<br><br><br>
                            <h5><strong>2. DIRECT REFERRAL BONUS</strong></h5><br>
                            You will earn #50 direct Referral bonus on each fellow that registers using your referral link, this is unlimited as you can refer as much as you can.<br><br><br>
                             <h5><strong>3. MATRIX EARNINGS</strong></h5><br>
                             Our matrix plan allows you to earn some percentage of your downlines’ registration fee. This does not matter if you are the referral, you will earn once your downlines refer people as well and the downlines of
                             your downlines and you keep earning commission deep down to the 6th generation of your team.<br><br>
                             
                        </p>
                        <center> <p class="text-center" style="text-align:center;">
                             <h2><strong><font color="blue">MATRIX COMPENSATION PLANS</font></strong></h2><br>
                          <h3>
                                Level 1<br>
                            #90 x 5 = #450<br>
                          </h3>
                            
                             <img src='images/1.jpeg' style="height:100px;"><br><br>
                           <h3>
                                Level 2<br>
                            #76 X 25 = #1900<br>
                            Incentive: 2 Tin of liquid milk<br>
                           </h3>
                             <img src='images/2.jpeg' style="height:200px; width:320px;"><br><br>
                            <h3>
                                Level 3<br>
                            #76 X 125 = #9500<br>
                            Incentive: Customized T-Shirt<br>
                            </h3>
                             <img src='images/3.jpeg' style="height:200px;"><br><br>
                            <h3>
                                Level 4<br>
                            #90 X 625 = #56,250<br>
                            Incentive: Food worth #5000<br>
                            </h3>
                             <img src='images/4.jpeg' style="height:200px;"><br><br>
                           <h3> Level 5<br>
                            #164 X 3125 = #512,500<br>
                            Incentive: New LG plasma TV<br>
                            </h3>
                             <img src='images/5.jpeg' style="height:200px;"><br><br>
                           <h3>
                                Level 6<br>
                            #165 X 15625 = #2,578,125<br>
                            Incentive: A trip to Dubai<br>
                           </h3>
                            <img src='images/6.jpeg' style="height:200px;"><br><br>
                        </p> </center>
                       <center> <h4 style="color:blue;font-weight:bold;">You still don't understand the matrix plan right?<br>
                       <font color="red"> Okay, this is what it means.</font></h4></center>
                        <p>
                            1. Once you refer 5 people, you'll earn #90 from each of them and that's total of #450. Your #50 direct Referral bonus on each members you refer will be added to it as well, making total of #700<br><br>
                            
                            2. When those 5 people refer the 5 people each, you'll earn #76 in 25 places and that's #19,000 + 2 tin of liquid milk.<br/><br/>
                            
                            3. When those 25 people refer the 5 people each, you'll earn #76 in 125 places and that's #95,000 + 1 Customized T-Shirt and 1 Face cap.<br><br>
                            
                            4. When those 125 people refer the 5 people each, you'll earn #90 in 625 places and that's #56,250 + Raw food worth #5000.<br><br>
                            
                            5. When those 625 people refer the 5 people each, you'll earn #164 in 3125 places and that's #512,500 + 1 New LG plasma TV.<br><br>
                            
                            6. When those 3125 people refer the 5 people each, you'll earn #165 in 15625 places and that's #2,578,125 + A trip to Dubai<br><br>
                        </p>
                        <p style="color:red;">
                            Note: The load is not on you as everybody only needs 5 people, but if you are able to bring more than 5, you'll earn the direct Referral bonus on each of them and the matrix spillover will distribute the users respectively to make sure the 5 downlines circulate and earnings are distributed accordingly irrespective of who invites them so as to allow everybody to move faster.
                        </p>
                        <br><br/>
                        <center>You can call or Chart our <b>Cuatomer Care Representative</b> up for enquary or assistance<br/>
                        <h3><font color="red">08168316414 <br/> <a href="https://wa.me/message/PBIUJYA7NSF5J1">OR <br/>CLICK HERE</h3></font><center>
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