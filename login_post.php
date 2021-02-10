<?php
session_start();
require_once "db.php";
$email_address=$_POST['email_address'];
$password=md5($_POST['password']);



    $count_query="SELECT COUNT(*) AS total FROM users where email_address='$email_address' AND password='$password' ";
    $data_from_db=mysqli_query($db_connect,$count_query);
    $after_assoc=mysqli_fetch_assoc($data_from_db);

    if($after_assoc['total']==1){

 $_SESSION['login_status']="yes";
 $_SESSION['email_address_from_login_page']="$email_address";

    header('location:dash_board.php');
    }
    
    else{
        echo  $_SESSION['email_password_wrong']="your email or password is wrong";
       header('location:login.php');
    }
    
    
    




?>