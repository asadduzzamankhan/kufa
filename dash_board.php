<?php
session_start();
if(!isset($_SESSION['login_status'])){
     echo header('location:login.php');
  
}

require_once 'includes/header.php';
require_once "nav.php";
require_once "db.php";
$email_address_from_SESSION=$_SESSION['email_address_from_login_page'];
$select_query="SELECT full_name FROM users WHERE email_address='$email_address_from_SESSION'";
$q=mysqli_query($db_connect,$select_query);
$after_assoc=(mysqli_fetch_assoc($q)['full_name']) ;
?>

<h1>welcome to dashboard</h1>
<h3>name:<?=$after_assoc?></h3>
<h2>email:<?= $email_address_from_SESSION?></h2>



<?php
require_once "includes/footer.php";
?>