
<?php
session_start();
require_once "db.php";
$portfolio_icon=$_POST['portfolio_icon'];
 $portfolio_number=$_POST['portfolio_number'];
 $portfolio_title=$_POST['portfolio_title'];
 $insert_query="INSERT INTO achivement(portfolio_icon,portfolio_number,portfolio_title) VALUES('$portfolio_icon','$portfolio_number','$portfolio_title')";
 
 $data_from_db=mysqli_query($db_connect,$insert_query);
   $_SESSION['status']="portfolio add successfully";
 
 header('location:portfolio.php');
?>