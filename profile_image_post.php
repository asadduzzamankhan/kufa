<?php
session_start();
require_once "db.php";
// extention
if(!$_FILES['new_profile']['name']){
    echo "insert your image";
    die();
}

$image_name = $_FILES['new_profile']['name'];
$name_after_explode=explode(".",$image_name);
$extaintion=end($name_after_explode);

$accepted_extaintion =['jpg','png','jpeg','JPG','PNG','JPEG'] ;
if(!in_array($extaintion,$accepted_extaintion)){
echo "this file formet is not supported";
die();
}


if($_FILES['new_profile']['size'] > 50000){
    echo "this image should be less than 50kb!";
    die();
}
// in_array te 2 ta input dite hoi extention ki r ka ka accept korbo



$email_address_from_login_page=$_SESSION['email_address_from_login_page'];
 $get_select_query="SELECT id,profile_image FROM users WHERE email_address='$email_address_from_login_page'";
 $data_from_db = mysqli_query($db_connect,$get_select_query);
 $after_asssoc=mysqli_fetch_assoc($data_from_db);
 $user_id=$after_asssoc['id'];

 $db_profile_image=$after_asssoc['profile_image'];
  
// echo $db_profile_image;
 if($db_profile_image != "default.jpg"){
     unlink("image/profile_image/".$db_profile_image);
 } 

// image upload start


 $image_new_name=$user_id.".".$extaintion;

$temp_location = $_FILES['new_profile']['tmp_name'];
$new_location = "image/profile_image/".$image_new_name;


// move_uploaded_file function 2 ta term dite hoi kothai ase r kothai jabe
move_uploaded_file($temp_location,$new_location);
// image upload end


// database start

 $update_query="UPDATE users SET profile_image='$image_new_name' WHERE email_address='$email_address_from_login_page'"; $data_from_db = mysqli_query($db_connect,$update_query);
header('location:profile.php');
// database end


?>


