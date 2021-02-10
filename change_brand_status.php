<?php
session_start();
require_once "db.php";
$id=$_GET['id'];
 $brand_image=$_GET['brand_image'];
 $what_to_do= $_GET['what_to_do'];
echo $update_query="UPDATE brands SET status='$what_to_do'WHERE id='$id'";

$data_from_db=mysqli_query($db_connect,$update_query);
header('location:brand.php');

?>