<?php
session_start();

if(isset($_SESSION['login_status'])){
  echo header('location:dash_board.php');

}
require_once "includes/header.php";

require_once "nav.php";
require_once "db.php";
?>



<div class="card   m-auto" style="max-width: 50rem;">
  <div class="card-header text-white bg-info text-center">login</div>
  <div class="card-body">
  <form action="login_post.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email_address">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" >
<?php
if(isset($_SESSION['email_password_wrong'])):?>
<small class="text-danger">
<?=$_SESSION['email_password_wrong'];
unset($_SESSION['email_password_wrong']);?>
</small>

<?php endif;?>
  </div>


 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>







<?php
require_once "includes/footer.php";
?>