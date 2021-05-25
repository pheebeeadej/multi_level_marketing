<?php
include 'inc/connect.php';

if(isset($_COOKIE['username'])){
  $_SESSION['username'] = $_COOKIE['username'];
   $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['user_type'] = $_COOKIE['user_type'];
}
if(isset($_SESSION['username'])){
    
    header("location: profile");
}
if(isset($_POST['login'])){
	$username =  mysqli_real_escape_string($database,$_POST['username']);
	$pwd =  mysqli_real_escape_string($database,$_POST['pwd']);

	if($username == "" || $pwd == ""){
		header("location: index.php?error=please fill all fields");
	}

	$sql = mysqli_query($database,"SELECT * FROM accounts WHERE username = '$username'");


	if(mysqli_num_rows($sql)>0){
	    $result = mysqli_fetch_assoc($sql);
	   
	    $verify_password1 = password_verify($pwd,$result['password']);
              if ($verify_password1 == 1) {
                  
                  
                  
                  if(mysqli_num_rows(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE username = '$username' AND blocked  = 'blocked'")) > 0){
                          	header("location: index.php?error=Your account has been blocked. Contact admin.");
                  }else{
                           $user_id = $result['id'];
                           
                          if(mysqli_num_rows( mysqli_query($database,"SELECT * FROM accounts_mlm WHERE user_id = '$user_id'") ) <  1){
                              mysqli_query($database," INSERT INTO `accounts_mlm` (`id`, `user_id`, `username`, `ancestor`, `activation`, `level`, `generation`, `earnings`, `user_type`, `referrer`, `referral_bonus`)
                              VALUES ('', '$user_id', '$username', '', '0', '0', '0', '0', 'user', '', '0');");
                          }
                          
                    		$_SESSION['username'] = $result['username'];
                    		$_SESSION['email'] = $result['email'];
                    		$_SESSION['user_id'] = $result['id'];
                    		
                    			$hour = time() + 3600 *24 * 30;//for 30 days
                                setcookie('pwd', $pwd, $hour,'/');
                                setcookie('username',  $username, $hour,'/');
                                setcookie('user_id',   $result['id'], $hour,'/');
                                
                    		
                    		
                    $sql = mysqli_query($database,"SELECT * FROM accounts_mlm WHERE username = '$username'");
                     $result = mysqli_fetch_assoc($sql);
                    	 $_SESSION['user_type'] = $result['user_type'];
                    	 setcookie('user_type',  $result['user_type'], $hour,'/');
                    	 
                    		header("location: profile");
            		
              }
              }else{
                  
        		header("location: index.php?error=Incorrect password");
              }
	   
	   
	}else{
		header("location: index.php?error=Not A Registered User");
	}

}?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="http://crmx-admin-template.multipurposethemes.com/bs4/images/favicon.ico">-->

    <title>Mayolad M.L.M - Log in </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Admin skins -->
	<link rel="stylesheet" href="css/skin_color.css">	

</head>
<body class="hold-transition theme-fruit bg-gradient-fruit">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
							<h2 class="text-white">M-CONNECT - M.L.M</h2>
							<p class="text-white-50">Account verification is needed, Kindly enter your M-connect account username and password to continure</p>							
						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">
							<form action="" method="POST" onsubmit="document.getElementById('login').innerHTML = 'Authenticating...';">
							    <?php
							        if($_GET['error']){
							           echo'
							           <div class="alert alert-danger">
									    '.$_GET['error'].'
								        </div>
								        '; 
							        }
							    ?>
							    
							    
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
										</div>
										<input type="text" name="username" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Username">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
										<input type="password" name="pwd" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
									</div>
								</div>
								  <div class="row">
									<div class="col-6">
									  <div class="checkbox text-white">
										<input type="checkbox" id="basic_checkbox_1" >
										<label for="basic_checkbox_1">Remember Me</label>
									  </div>
									</div>
								
									<div class="col-12 text-center">
									  <button type="submit" name="login" id="login" class="btn btn-info btn-rounded mt-10">ENTER MLM DASHBOAD</button>
									</div>
									
								  </div>
							</form>														
<br/>
							<div class="text-center">
									<p class="mt-15 mb-0 text-red"><b>Are you a new user here and you wish to know more about M-Connect M.L.M and how it works?</b></p> <br/>  <h3> KINDLY STUDY THE PRESENTATION BELOOW </h3>
								<br/>
							</div>
						</div>
						
						
						
					</div>
				</div>
			</div>
			
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
                        
                              In as much the desire to accumulate extra cash keeps rising with each passing day, it is extremely important to ensure that the method used is legit and sustainable. Online options continue to be some of the most favoured avenues of making money today and the best of it is a multi-level marketing system because you keep earning forever and even while you stop working, you only need to work once and keep earning forever.<br><br>
                        
                              But how does MAYOLAD CONNECT work? Is it even beneficial? How can I earn on M-CONNECT platform?<br><br>
                        </p>
                        M-connect is an already existing VTU/Telecome Website which as been functioning since 2019 and which we just added the New MLM program that allows you to earn from your donwlines 
                         deep down to 6th generation. The two programs are now running concurrently on one platform, which means you can decide to withdraw your earnings on MLM directly to your bank account with instant
                         reflection or use it to purchase data and other services in VTU. <br><br>
                        <p>
                             <center><h2><strong><font color="blue">THREE DIFFERENT WAYS TO EARN ON M-CONNECT</font></strong></h2> </center><br>
                            <h5><strong>1. RE-SELLING OUR SERVICES</strong></h5><br>
                            MAYOLAD CONNECT as provided the following services all at a very cheap rate (resellersâ€™ rate) for you to resell and make huge profits.<br>
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
                             Our matrix plan allows you to earn some percentage of your downlinesâ€™ registration fee. This does not matter if you are the referral, you will earn once your downlines refer people as well and the downlines of your downlines and you keep earning commission deep down to the 6th generation of your team.<br><br>
                             
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
	</div>


	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
	
	<!-- fullscreen -->
	<script src="assets/vendor_components/screenfull/screenfull.js"></script>
	
	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>


</html>



