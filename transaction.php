<?php include("inc/head.php");
$user_id = $_SESSION['user_id'];
$fetchr = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE user_id = '$user_id'"));

$username = $fetchr['username'];
$activation = $fetchr['activation'];

if($activation == 0){
    echo'
        <script>alert("Activation fee is required to continue"); window.location ="payment.php"; </script>
    ';
}

// fetching out all tyransaction
  if(isset($_POST['search_submit'])){
        $key = mysqli_real_escape_string($database,$_POST['search']);
           
        $fet = mysqli_query($database, "SELECT * FROM mlm_notification WHERE transactionID LIKE '%$key%' OR type LIKE '%$key%' OR amount LIKE '%$key%' OR status LIKE '%$key%' OR transaction_ref LIKE '%$key%'  OR date LIKE '%$key%' AND username = '$username'  ORDER BY id DESC LIMIT 30");
               
    }else{
        
        $fet = mysqli_query($database, "SELECT * FROM mlm_notification WHERE username = '$username' ORDER BY id DESC LIMIT 30");
        
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
		<div class="content-header">
		
		</div>

		<!-- Main content -->
		<section class="content">
			
			<div class="container-full">
                <!-- Content Header (Page header) -->
               
                <!-- Main content -->
                <section class="content p-0">
                  <div class="row">
                      
                  
                    <div class="col-12 p-0">
        
                     <div class="box p-0">
                        <div class="box-header with-border">
                          <h3 class="box-title">Transaction History</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                              <div id="example5_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 p-0">
                                <div class="row">
                                  <div class="col-sm-12  ">
                                      <div  class="dataTables_filter">
                                        <form action="" method="POST">
                                          <label><input type="search" name="search" required="" class="form-control" placeholder="Input search text here" ><button type="submit" name="search_submit" class="btn btn-primary btn-rounded pt-1  pb-1"><i class="ti-search"></i></button></label>
                                        </form>
                                      </div>
                                  </div>
                                </div>
                                  
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example5" class="table table-bordered table-striped dataTable" style="width: 100%;" role="grid" aria-describedby="example5_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 103px;">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 161px;">Type</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 71px;">Amount</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 66px;">Transaction ref</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example5" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 58px;">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                    
                                                if(mysqli_num_rows($fet) >0){
                                                    
                                                    while( $fetch = mysqli_fetch_assoc($fet) ){
                                                       
                                                     echo '
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">'.$fetch["transactionID"].'</td>
                                                            <td>'.$fetch["type"].'</td>
                                                            <td>₦'.$fetch["amount"].'</td>
                                                            <td>'.$fetch["status"].'</td>
                                                            <td>'.$fetch["transaction_ref"].'</td>
                                                            <td>'.$fetch["date"].'</td>
                                                        </tr>
                                                          ';
                                                    }
                                                }
                                            ?>
                                         
                                                
                                            </tbody>
                                           
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->      
                    </div> 
        
                    
                  </div>
                  <!-- /.row -->
                </section>
                <!-- /.content -->
              
              </div>
		
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
<?php include("inc/footer.php");
?>