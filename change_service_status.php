<?php
require_once "db.php";
$id= $_GET['id'];
 $what_to_do= $_GET['what_to_do'];
$update_query="UPDATE services SET status='$what_to_do' WHERE id=$id";
$data_from_db=mysqli_query($db_connect,$update_query);
header('location:services.php');

?>