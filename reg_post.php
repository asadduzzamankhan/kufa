<?php
SESSION_START();
require_once "db.php";
$full_name=$_POST['full_name'];
$email_address=$_POST['email_address'];
$password=md5($_POST['password']);
$confirm_password=md5($_POST['confirm_password']);
$gender=$_POST['gender'];
if($password==$confirm_password){

$count_query="SELECT COUNT(*) AS total FROM users where email_address='$email_address' ";
$data_from_db=mysqli_query($db_connect,$count_query);
$after_assoc=mysqli_fetch_assoc($data_from_db);
if($after_assoc['total']==0){
$insert_query="INSERT INTO users(full_name,email_address,password,gender) VALUES('$full_name','$email_address','$password','$gender')";
$data_from_db=mysqli_query($db_connect,$insert_query);
header('location:login.php');
}
else{
    $_SESSION['duplicate_email_error']="this email has been used";
   header('location:reg.php');
}


}




?>