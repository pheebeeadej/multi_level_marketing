<?php
 require ("connect.php");
 if(isset( $_POST['ancestor'])){
 $username = $_SESSION['username'];
 
 
 
 
 $ancestor= mysqli_real_escape_string($database ,$_POST['ancestor']);
 
 
 $ancesstordetails = mysqli_fetch_array(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE username = '".$ancestor."'"));
 $generation = $ancesstordetails['generation']; 
 
//  check if ancestor has complete 5 people
  $ans_count= mysqli_num_rows(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE ancestor = '".$ancestor."'"));
  
  
if($ans_count >= 5){
     $generation = 0;
     $refer = $ancestor;
     $ancestor ="";
     
}else if($generation==6){
     $generation =0;
     $refer = $ancestor;
     $ancestor ="";
 }elseif($generation <6 && $ans_count <5){
     $generation = $generation + 1;
        
         $ansi = $ancestor; 
         $level = 1;
     while($level <= $generation){
         
         mysqli_query($database, "UPDATE accounts_mlm SET level ='$level' WHERE username='".$ansi."'"); 
         
         $fetching = mysqli_fetch_array(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE username = '$ansi'"));
         
         $ansi = $fetching['ancestor'];
         $level+=1;
     }
 }
   
 $refer = $ancestor;
  $upd1 =  mysqli_query($database, "UPDATE accounts_mlm SET ancestor ='$ancestor' , generation ='$generation'  , referrer ='$refer'  WHERE username='".$username."'");  
              
//   file_put_contents("flutterrrrrwav2.txt", $ancestor." you must be mad at ".$user_id);   
 }else{
     header("location:../index.php");
 }
 