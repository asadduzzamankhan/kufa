<?php
session_start();
require_once "db.php";
$id=$_GET['id'];
$delete_query="DELETE from users WHERE id='$id'";
$data_from_users=mysqli_query($db_connect,$delete_query);
$_SESSION['status']="delete users successfully";
header('location:user_list.php');
?>