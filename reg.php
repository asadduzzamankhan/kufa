<?php
session_start();
require_once "includes/header.php";
require_once  "nav.php";
?>



<div class="card   m-auto" style="max-width: 50rem;">
  <div class="card-header text-white bg-info text-center">reg</div>
  <div class="card-body">
  <form action="reg_post.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">full_name</label>
    <input type="text" class="form-control" name="full_name" >

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email_address">
   
   <?php
if(isset( $_SESSION['duplicate_email_error'])):
    ?>

<small class="text-danger">


   <?= $_SESSION['duplicate_email_error'];
    unset($_SESSION['duplicate_email_error']);?>

</small>
<?php endif;?>
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">confirm Password</label>
    <input type="password" class="form-control" name="confirm_password">
  </div>


  <input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label> 

 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>







<?php
require_once "includes/footer.php";
?>