<?php include("inc/head.php");

$user_type = $_SESSION['user_type'];
if($user_type != "admin"){
    // echo'
    //     <script>window.location ="profile"; </script>
    // ';
    header('location:profile');
}
$user_id = $_SESSION['user_id'];



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
                        <h3 style="color:blue;">Edit User</h3>
                        <form action="edit_user.php" method="POST" onsubmit="document.getElementById('pay1').innerHTML = 'Processing...';">
                          <div class="form-body">
                              <div class="row">
                                  <?php
                                      if(isset($_POST['submit_mlm_settings'])){
                                        
                                        $action = mysqli_real_escape_string($database,$_POST['action']);
                                        $k = mysqli_real_escape_string($database,$_POST['id']);
                                      if($action == ""){
                                           echo '<div class="alert alert-secondary">No changes were made</div>';
                                      }else{
                                          
                                            $upds= mysqli_query($database, "UPDATE `accounts_mlm` SET `blocked` = '$action' WHERE `id` = '$k'; " );
                                            
                                            if($upds){
                                               echo '<div class="alert alert-success">Information updated successfully</div>'; 
                                            }else{
                                                echo '<div class="alert alert-danger">Something went wrong, please retry</div>'; 
                                            }
                                        
                                      } 
                                        
                                      }elseif(isset($_GET['k'])){
    
                                            $k = $_GET['k'];
                                            
                                        }else{
                                            
                                            echo'<script>window.location = "admin_not_exclusively_found1"</script>';
                                            
                                        }
                                    
                                  ?>
                                  <?php 
                                   $fet = mysqli_query($database, "SELECT * FROM accounts_mlm where id = '$k' ");
                                   $fetch = mysqli_fetch_assoc($fet) 
                                   ?>
                                   <input type="hidden" value="<?php echo $k?>" name="id"> 
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">Username</label>
                                        <input  type="text" readonly="" value="<?php echo $fetch['username']; ?>"  class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">Balance</label>
                                        <input type="text" readonly="" value="<?php echo $fetch['earnings']; ?>"  class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">Referrer</label>
                                        <input type="text" readonly="" value="<?php echo $fetch['referrer']; ?>"  class="form-control" placeholder="">
                                      </div>
                                  </div>
                                   
                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="font-weight-700 font-size-16">Action <span style="color:green;"><?php echo $fetch['blocked'];?></span></label>
                                        <select class="form-control" name="action">
                                            <option value="">----------------</option>
                                            <option value="blocked">Block</option>
                                            <option value="enabled">Enable</option>
                                        </select>
                                      </div>
                                  </div>
                                  
                                  <!--/span-->
                              </div>
                              <!--/row-->
                          </div>
                           
                          <div class="form-group mt-10">
                             <button type="submit" name="submit_mlm_settings" id="pay1" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
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