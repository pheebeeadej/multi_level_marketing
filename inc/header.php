<body class="hold-transition light-skin sidebar-mini theme-deepocean">
	
	<div class="art-bg">
	  
	</div>
	
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo -->
	  <div class="logo-mini">
		  <!-- <span class="light-logo"><img src="../images/logo-light.png" alt="logo"></span>
		  <span class="dark-logo"><img src="../images/logo-dark.png" alt="logo"></span> -->
		  <!-- <h3 style="color: white;">Welcome</h3>	 -->
		  	
	  </div>
      <!-- logo-->
      <div class="logo-lg">
		  <!-- <span class="light-logo"><img src="../images/logo-light-text.png" alt="logo"></span>
			<span class="dark-logo"><img src="../images/logo-dark-text.png" alt="logo"></span> -->
		  
			<h3 style="color: white;">Welcome</h3>
	  </div>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div>
		  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<i class="ti-align-left"></i>
		  </a>
		  
		
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  <!-- full Screen -->
	     	
		  <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="User">
              <img src="images/avatar.png" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu animated flipInX">
              <!-- User image -->
              <li class="user-header bg-img" style="background-image: url(../images/user-info.jpg)" data-overlay="3">
				  <div class="flexbox align-self-center">					  
				  	<img src="images/avatar.png" class="float-left rounded-circle" alt="User Image">					  
					<h4 class="user-name align-self-center">
					  <span><?php echo $_SESSION['username'];?></span>
					  <small><?php echo $_SESSION['email'];?></small>
					</h4>
				  </div>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
				    <!--<a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-person"></i> My Profile</a>-->
					<a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-email-unread"></i>₦ <?php echo $earnings;?></a>
					<!--<div class="dropdown-divider"></div>-->
					<!--<a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-settings"></i> Account Setting</a>-->
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="inc/logout.php"><i class="ion-log-out"></i> Logout</a>
					<div class="dropdown-divider"></div>
              </li>
            </ul>
          </li>	
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  