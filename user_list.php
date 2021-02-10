

<?php
session_start();
require_once "includes/header.php";
require_once "nav.php";
require_once "db.php";

$select_query="SELECT * FROM users";
$data_from_db=mysqli_query($db_connect,$select_query);


?>



<div class="card   m-auto" style="max-width: 50rem;">
  <div class="card-header text-white bg-info text-center">user_list</div>
  <div class="card-body">
 
<div class="alert alert-success text-center">
   total:<?=$data_from_db->num_rows?>

</div>
<?php
if(isset( $_SESSION['status'])):
    ?>

<div class="alert alert-danger">


   <?= $_SESSION['status'];
    unset($_SESSION['status']);?>

</div>
<?php endif;?>

<?php
if(isset( $_SESSION['success_mess'])):
    ?>

<div class="alert alert-success">


   <?= $_SESSION['success_mess'];
    unset($_SESSION['success_mess']);?>

</div>
<?php endif;?>

  <table class="table">
  <thead>
    <tr>

      <th scope="col">serial_no</th>
      <th scope="col">id</th>
      <th scope="col">full_name</th>
      <th scope="col">email_address</th>
      <th scope="col">gender</th>
    </tr>
  </thead>
  <tbody>

<?php
$serial_no=1;
foreach($data_from_db as $user):
?>

    <tr>
      <td><?= $serial_no++ ?></td>
      <td><?= $user['id'] ?></td>
      <td><?= $user['full_name'] ?></td>
      <td><?=$user['email_address']?></td>
      <td><?=$user['gender']?></td>
      <td>
    <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-outline-success">edit</a>
    <a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-outline-danger">delete</a>
    </td>
    </tr>

<?php
endforeach;
?>


  </tbody>
</table>


  </div>
</div>







<?php
require_once "includes/footer.php";
?>


