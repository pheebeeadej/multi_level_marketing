<?php

 require ("inc/connect.php");

// Retrieve the request's body
$body = @file_get_contents("php://input");

// retrieve the signature sent in the reques header's.
$signature = (isset($_SERVER['HTTP_VERIF_HASH']) ? $_SERVER['HTTP_VERIF_HASH'] : '');

//  file_put_contents("flutterrrrrwav.txt", $signature);
/* It is a good idea to log all events received. Add code *
 * here to log the signature and body to db or file       */ 

if (!$signature) {
    // only a post with rave signature header gets our attention
    exit();
}


$local_signature ='0f6e08b810d775676864e52dbdf8';// getenv('SECRET_HASH');

// confirm the event's signature
if( $signature !== $local_signature ){
  // silently forget this ever happened
  exit();
}

 
     
     
$response = json_decode($body, true);

    file_put_contents("flutterrrrrwav2.txt", $body);   

    $status2=$response['data']['status'];
    $amountpaid=$response['data']['amount'];
    $paidemail=$response['data']['customer']['email'];
    $paidname=$response['data']['customer']['name'];
    $ref= $response['data']['tx_ref'];
    $id= $response['data']['id'];
    
    date_default_timezone_set('Africa/Lagos');
    $date= date("Y/m/d - h:i:sa");
    
    
    $userdetails = mysqli_fetch_array(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE username = '".$paidname."'"));
    $ancestor = $userdetails['ancestor'];
    $generation = $userdetails['generation'];
    // $uid =   $userdetails['user_username'];
    
  
    if( mysqli_num_rows(mysqli_query($database,"SELECT * FROM mlm_notification WHERE transaction_ref = '$ref' OR transactionID = '$id'")) > 0){
        
        exit();
    }elseif(mysqli_num_rows(mysqli_query($database,"SELECT * FROM mlm_notification WHERE transaction_ref = '$ref' OR transactionID = '$id'")) == 0){
            if ($response['data']['status'] == 'successful') {
            
              $upd1 =  mysqli_query($database, "UPDATE accounts_mlm SET activation ='1' , level ='1'  WHERE username='".$paidname."'");  
              
              if($upd1){
                //   where i will credit ancestor
                        $count = 1;
                        $ansi = $ancestor;
                     while($count <= $generation){
                         
                          $generationvariable = "level_".$count."_earning";
                          $generationvalue = mysqli_fetch_array( mysqli_query($database,"SELECT * FROM mlm_fees WHERE id = '1'"));
                          $level_fee = $generationvalue[$generationvariable];
                        //   get ancestor wallet
                          $ancestor_details = mysqli_fetch_array( mysqli_query($database,"SELECT * FROM accounts_mlm WHERE username='".$ansi."'"));
                          $ancestor_wallet =  $ancestor_details['earnings'];
                         
                          $fee = $ancestor_wallet + $level_fee;
                        
                        
                          $upd1t =  mysqli_query($database, "UPDATE accounts_mlm SET earnings ='$fee' WHERE username='".$ansi."'");  
                        //   new ancestor value
                          $ansi = $ancestor_details['ancestor'];
                          $count+=1;
                          
                     }      
                
              }
               
            mysqli_query($database, " INSERT INTO `mlm_notification` (`id`, `username`, `email`, `transactionID`, `transaction_ref`, `status`, `type`, `amount`, `date`) 
            VALUES ('', '$paidname', '$paidemail', '$id', '$ref', '$status2', 'activation fee', '$amountpaid', '$date');");
           
            //   give referrer bonus
            $userdetails = mysqli_fetch_array(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE username = '".$paidname."'"));
            $ancestor = $userdetails['ancestor'];
            $referrer = $userdetails['referrer'];
            
            $public_keys = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM mlm_settings WHERE id = '1'"));
            $referal_bonus = $public_keys['referal_bonus'];   
            
            
             $fetchdetails = mysqli_fetch_array(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE username = '$ancestor' OR username = '$referrer'"));
             $ansi_referral_bonus = $fetchdetails['referral_bonus'];
            
            $giveout = $ansi_referral_bonus + $referal_bonus;
            
             $upd1t =  mysqli_query($database, "UPDATE accounts_mlm SET referral_bonus ='$giveout' WHERE username='".$ancestor."'"); 
            
            
            http_response_code(200); // PHP 5.4 or greater
        

            }else{
                http_response_code(500);
            }
            exit();
    }else{}


exit();


