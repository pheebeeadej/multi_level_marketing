 <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar" style="opacity: 1 !important; background-color: rgba(255, 250, 250, 0.432);">
		
        <div class="user-profile">
			<div class="ulogo">
				
			</div>
			<div class="profile-pic">
				<img src="images/avatar.png" alt="user">	
					<div class="profile-info"><h4><?php echo $_SESSION['username'];?></h4>
						
					</div>
			</div>
        </div>
      <?php
      $usernam = $_SESSION['username'];
        if(mysqli_num_rows(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE username = '$usernam' AND blocked  = 'blocked'")) > 0){
                          echo'<script>window.location = "inc/logout.php";</script>';
                        //   	header("location: inc/logout.php");
        }
      ?>
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
		  
        <li class="header nav-small-cap">Earnings: ₦<?php echo $earnings;?></li>
			  
		<li>
			<a href="profile">
			  <i class="ti-exchange-vertical"></i>
			  <span>Dashboard</span>
			</a>
		  </li> 
		  	  
		<li>
			<a href="withdraw">
			  <i class="ti-money"></i>
			  <span>withdraw</span>
			</a>
		  </li> 
		  	<li>
			<a href="transfer_earning">
			  <i class="ti-money"></i>
			  <span>Earnings To Wallet</span>
			</a>
		  </li> 
		<?php
	    if($_SESSION['user_type'] == "admin"){
	        echo'
    		  <li>
    			<a href="admin_not_exclusively_found">
    			  <i class="ti-list"></i>
    			  <span>Admin: Settings</span>
    			</a>
    		  </li> 
    		  <li>
    			<a href="admin_not_exclusively_found2">
    			  <i class="ti-list"></i>
    			  <span>Admin: Transactions</span>
    			</a>
    		  </li> 
    		   <li>
    			<a href="admin_not_exclusively_found1">
    			  <i class="ti-list"></i>
    			  <span>Admin: Users</span>
    			</a>
    		  </li> 
		   ';
		   }?>
		  <li>
			<a href="inc/logout">
			  <i class="ti-power-off"></i>
			  <span>Log Out</span>
			</a>
		  </li> 
        
      </ul>
    </section>
  </aside>