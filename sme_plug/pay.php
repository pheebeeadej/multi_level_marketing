<?php
include("../inc/connect.php");
$fetch = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM mlm_settings WHERE id = '1'"));
$secret_key = $fetch['smeplug_secret_key'];

$fetch11 = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM mlm_settings WHERE id = '1'"));
$minimum_withdrawal = $fetch11['minimum_withdrawal'];
$withdrawal_charge = $fetch11['withdrawal_charge'];

// fetch user details
$user_id = $_SESSION['user_id'];
$fetch = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM accounts_mlm WHERE user_id = '$user_id'"));
$earnings = $fetch['earnings'];
$paidname = $fetch['username'];
$paidemail  = $fetch['email'];


$bank_name = $_POST['bank_name'];
$acc_number = $_POST['acc_number'];
$amount = $_POST['amount'];

if($amount < $minimum_withdrawal){
    echo'<script>alert("amount is lesser than minimum withdrawal");window.location ="../withdraw.php";</script>';
    exit();
}elseif($amount > $earnings){
    echo'<script>alert("insufficient earning balance. Earnings: '.$earnings.'");window.location ="../withdraw.php";</script>';
    exit();
}elseif($amount <= $earnings){
    
          $curl = curl_init();
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://smeplug.ng/api/v1/transfer/send',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
        	"bank_code": "'.$bank_name.'",
        	"account_number": "'.$acc_number.'",
        	"amount": "'.$amount.'",
        	"description": "M.L.M Withdrawal",
            "customer_reference": "'.$user_id.'"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$secret_key
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        // echo $response;
        $res = json_decode($response,true);
        $status = $res['status'];
        
        if($status == true){
        //   put into transactions in the database
        $id= time();
        $ref= "WT".time()."AUTO";
        $date = date("Y/m/d - h:i:sa");
        
          mysqli_query($database, " INSERT INTO `mlm_notification` (`id`, `username`, `email`, `transactionID`, `transaction_ref`, `status`, `type`,  `amount`, `date`) 
            VALUES ('', '$paidname', '$paidemail', '$id', '$ref', 'succesful',  'withdrawal', '$amount', '$date');");
           
        
        // subtract fund from user
        $bal = $earnings - $amount - $withdrawal_charge;
        
         $upd1 =  mysqli_query($database, "UPDATE accounts_mlm SET earnings = '$bal' WHERE user_id='$user_id'"); 
         
           echo'<script>alert("Withdrwal initiated successfully, and account will be credited in few minutes.");window.location ="../profile.php";</script>';
            exit();
            
        // alert and go to profile
        }else{
            echo'<script>alert("Something went wrong, try again later or contact admin.");window.location ="../withdraw.php";</script>';
            exit();
        }

}
