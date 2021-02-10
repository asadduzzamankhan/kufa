

<?php
session_start();

require_once "db.php";
require_once "includes/header.php";
require_once "nav.php";
$email_address_from_login_page=$_SESSION['email_address_from_login_page'];
  $select_profile_pic_query="SELECT profile_image from users where email_address='$email_address_from_login_page'";
   $data_from_db = mysqli_query($db_connect,$select_profile_pic_query);
  $after_assoc = (mysqli_fetch_assoc($data_from_db)['profile_image']);
?>


<div class="row mt-3">

<div class="col-lg-6 ml-5">

<div class="card mb-3">
  <div class="card-header text-white bg-info text-center">change profile pic</div>
  <div class="card-body">
  <div class="text-center">
  <img width="100" src="image/profile_image/<?=$after_assoc?>" alt="no image">

<?php if($after_assoc != 'default.jpg'):?>
<a class="btn btn-danger" href="delete_profile_image_post.php?picture_name=<?=$after_assoc?>">DELETE</a>

  <?php endif;?>
  </div>
  
  <form action="profile_image_post.php" method="POST" enctype="multipart/form-data">


  <div class="form-group">
    <label for="exampleInputPassword1">new profile</label>
    <input type="FILE" class="form-control" name="new_profile" >

  </div>
 
 
  <button type="submit" class="btn btn-primary">change now</button>
</form>
  </div>
</div>

</div>




<div class="col-lg-5">

<div class="card mb-3">
  <div class="card-header text-white bg-info text-center">change password</div>
  <div class="card-body">
  <form action="profile_post.php" method="POST">


  <div class="form-group">
    <label for="exampleInputPassword1">old_Password</label>
    <input type="password" class="form-control" name="old_Password" >

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">new_Password</label>
    <input type="password" class="form-control" name="new_Password" id="new_Password" ><input type="checkbox" onclick="SPassword()">Show Password 

   <script>
    
    function SPassword() {
  var x = document.getElementById("new_Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
    </script>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">comfirm_Password</label>
    <input type="password" class="form-control" name="comfirm_Password" id="comfirm_Password" >
    <input type="checkbox" onclick="ShowPassword()">Show Password 
    <script>
    
    function ShowPassword() {
  var x = document.getElementById("comfirm_Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
    </script>

  </div>


 
  <button type="submit" class="btn btn-primary">change your password</button>
</form>
  </div>
</div>

</div>

</div>


<?php
require_once "includes/footer.php";
?>

