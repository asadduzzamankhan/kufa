<?php
session_start();
require_once "db.php";
$image_name = $_FILES['brand_image']['name'];
$name_after_explode=explode(".",$image_name);
$extaintion=end($name_after_explode);

// image upload start

 $image_new_name=time()."-".rand(1000,9999).".".$extaintion;

$temp_location = $_FILES['brand_image']['tmp_name'];
$new_location = "image/brand_image/".$image_new_name;


// move_uploaded_file function 2 ta term dite hoi kothai ase r kothai jabe
move_uploaded_file($temp_location,$new_location);

 $insert_query="INSERT INTO brands(brand_image_name)VALUES('$image_new_name')";
 $data_from_db=mysqli_query($db_connect,$insert_query);
 $_SESSION['status']="brand add successfully";
header('location:brand.php');

 
// image upload end



// session_start();
// require_once "db.php";
// $service_icon=$_POST['service_icon'];
//  $service_title=$_POST['service_title'];
//  $service_description=$_POST['service_description'];
//  $insert_query="INSERT INTO services(service_icon,service_title,service_description) VALUES('$service_icon','$service_title','$service_description')";
 
//  $data_from_db=mysqli_query($db_connect,$insert_query);
//    $_SESSION['status']="service add successfully";
 
//  header('location:services.php');
?>