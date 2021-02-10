<?php

require_once 'includes/header.php';

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE_NAME","kufa");



   
// coder sathe databse connet korar jonno mysqli_connect builtin use korte hobe
$db_connect = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE_NAME);
if(mysqli_connect_errno()){
    echo "<h1>this is something wrong</h1>";
   }
//    database connect end
?>