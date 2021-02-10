<?php
session_start();
require_once "db.php";
$service_icon=$_POST['service_icon'];
 $service_title=$_POST['service_title'];
 $service_description=$_POST['service_description'];
 $insert_query="INSERT INTO services(service_icon,service_title,service_description) VALUES('$service_icon','$service_title','$service_description')";
 
 $data_from_db=mysqli_query($db_connect,$insert_query);
   $_SESSION['status']="service add successfully";
 
 header('location:services.php');
?>