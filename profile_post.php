<?php
session_start();
require_once "includes/header.php";
require_once "db.php";

$email_address=$_SESSION['email_address_from_login_page'];
$encript_Password=md5($_POST['old_Password']);

$check_query="SELECT COUNT(*) as total FROM users WHERE email_address='$email_address' AND password='$encript_Password'";

$data_from_db=mysqli_query($db_connect,$check_query);
 $after_assoc=mysqli_fetch_assoc($data_from_db);



$new_Password=md5($_POST['new_Password']);
$comfirm_Password=md5($_POST['comfirm_Password']);


if($new_Password==$comfirm_Password){


    if($after_assoc['total']==1){
        if($new_Password==$comfirm_Password){
            echo $new_Password;
            echo $email_address;

       $update_query="UPDATE users SET password='$new_Password' WHERE email_address='$email_address' ";
      $data_from_db=mysqli_query($db_connect,$update_query);
      header('location:profile.php');


        }
    }
    else{
        echo "your old password is wrong";
    }



}

else{
    echo " your password did not matched";
}


?>


<?php
require_once "includes/footer.php";
?>

