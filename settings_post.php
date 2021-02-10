<?php
session_start();
require_once 'db.php';
foreach($_POST as $settings_name=>$settings_value){
 $update_query="UPDATE text_settings SET settings_value='$settings_value' WHERE settings_name='$settings_name'";
 $from_db=mysqli_query($db_connect,$update_query);
}
$_SESSION['status']="settings updated successfully";

header('location:settings.php');


?>