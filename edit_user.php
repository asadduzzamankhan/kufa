<?php
require_once "includes/header.php";

require_once "nav.php";
require_once "db.php";
$id=$_GET['id'];
$select_query = "SELECT id,full_name,email_address,gender From users WHERE id='$id'";
$data_from_db=mysqli_query($db_connect,$select_query);
$after_assoc=mysqli_fetch_assoc($data_from_db);

?>



<div class="card   m-auto" style="max-width: 50rem;">
  <div class="card-header text-white bg-info text-center">edit-user</div>
  <div class="card-body">
  <form action="edit_user_post.php" method="POST">
 
  <div class="form-group">
    <label for="exampleInputEmail1">full_name</label>
    <input type="hidden" class="form-control"  value="<?= $after_assoc['id']?>" name="id">
    <input type="hidden" class="form-control"  value="<?= $after_assoc['full_name']?>" name="old_full_name">
    <input type="text" class="form-control"  value="<?= $after_assoc['full_name']?>" name="full_name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" value="<?= $after_assoc['email_address']?> "name="email_address">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
 

  <div class="form-group">
  <input type="radio" id="male" name="gender" value="male"
  
  <?php
  if($after_assoc['gender'] =='male'){
      echo "checked";
  }
  ?>
  >
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female"
<?php
if($after_assoc['gender']=='female'){
      echo "checked";
  }
  ?>
>
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other"
<?php
if($after_assoc['gender']=='other'){
      echo "checked";
  }
  ?>

>
<label for="other">Other</label> 
 
  <button type="submit" class="btn btn-primary">Submit</button>
   </form>
  </div>
</div>







<?php
require_once "includes/footer.php";
?>