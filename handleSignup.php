<?php
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconnect.php';
    $otp_str = str_shuffle("04926");
    $otp = substr($otp_str,0,6);
    $act_str = rand(100000,10000000);
    $Acti_code = str_shuffle("abcdefghi".$act_str);

    
    $otp = $_POST['otp'];
    $Acti_code = $_POST['Acti_code'];
    $user_email =mysqli_real_escape_string($conn $_POST['signUpEmail']);
    $pass = mysqli_real_escape_string($conn,$_POST['signUpPassword']);
    $cpass = mysqli_real_escape_string($conn,$_POST['signUpCPassword']);

    $existSql ="select * from `user` where user_email ='$user_email'";
    $result = mysqli_query($conn,$existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
        echo $showError;
    }
    else{
        if($pass==$cpass){
         $hash = password_hash($pass, PASSWORD_DEFAULT);
         $sql = "INSERT INTO `user` ( `user_email`, `user_pass`, `timestamp`) VALUES ( '$user_email', '$hash', current_timestamp())";
         $result = mysqli_query($conn,$sql);
         if($result){
            $showAleart=true;
            header("Location:index.php?signupsuccess=true");
            exit();
         }
        } 
        else{
            $showError = "Passwords do not match";
            echo $showError;
           
        }
    }
    header("Location:index.php?signupsuccess=false&error=$showError");
    
}



?>