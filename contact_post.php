<?php
session_start();
require_once 'db.php';
$guest_name=$_POST['guest_name'];
$guest_email=$_POST['guest_email'];
$guest_message=$_POST['guest_message'];

 $insert_query="INSERT INTO contact(guest_name,guest_email,guest_message)VALUES('$guest_name','$guest_email','$guest_message')";
 $data_from_db=mysqli_query($db_connect,$insert_query);
   $_SESSION['status']="We recived your message successfully";
     header('location:index.php#contact');
?>