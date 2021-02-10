


<?php
session_start();

require_once "db.php";
require_once "includes/header.php";
require_once "nav.php";
$email_address = $_SESSION['email_address_from_login_page'];
 $select_query = "SELECT * FROM services";
$all_services_from_database = mysqli_query($db_connect,$select_query);
// print_r($all_services_from_database -> num_rows);
?>
<div class="row mt-3">
    <div class="col-lg-7 ml-2">

        <div class="card mb-3">
            <div class="card-header text-white bg-info text-center">service list</div>
            <div class="card-body">

<table class="table">
        <thead>
                 <tr>
                    <th scope="col">id</th>
                    <th scope="col">service_icon</th>
                    <th scope="col">service_title</th>
                    <th scope="col">service_description</th>
                    <th scope="col">service_status</th>
                 </tr>
        </thead>
        <tbody>

              <?php
             
              foreach($all_services_from_database as $serv):
              ?>

            <tr>
                <td><?=$serv['id']?></td>
                <td><i class="<?=$serv['service_icon']?>"></i></td>
                <td><?=$serv['service_title']?></td>
                <td><?=$serv['service_description']?></td>

                <td>
                <?php if($serv['status']=='active'): ?>
                    <span class="badge badge-success"><?=$serv['status']?>
                    </span>
                      <a  href="change_service_status.php?id=<?=$serv['id']?> &what_to_do=deactive" type="button" class="btn btn-info btn-sm p-10">make as deactive</a>
                     
                    <?php else:?>
                    <span class="badge badge-danger">
                    <?= $serv['status'] ?>
                    </span>
                    <a href="change_service_status.php?id=<?=$serv['id']?> & what_to_do=active" type="button" class="btn btn-warning btn-sm p-10">make as active</a>
                     
                    
                    <?php endif;?>
                </td>
            
            </tr>

           <?php
           
              endforeach;
           ?>
        
        </tbody>
</table>



            </div>

        </div>
   </div>



        <div class="col-lg-4 ml-3">

            <div class="card ">
                <div class="card-header text-white bg-info text-center">ADD SERVICE</div>
                <div class="card-body">





                <?php if(isset($_SESSION['status'])):?>
               <div class="alert alert-success">
                   <?=$_SESSION['status'];?>
                   <?php unset($_SESSION['status']);?>
               </div>

               <?php 
            endif; 
            ?>
                    <form action="services_post.php" method="POST">


                        <div class="form-group">
                            <label>service icon</label>
                            <input type="text" class="form-control" name="service_icon">
                        </div>
                    <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">icon</a>
                        <div class="form-group">
                            <label>service title</label>
                            <input type="text" class="form-control" name="service_title">

                        </div>

                        <div class="form-group">
                            <label >service description</label>
                            <textarea name="service_description" class="from-control" rows="4"></textarea>

                        </div>


                        <button type="submit" class="btn btn-primary">add now</button>
                    </form>
                </div>
            </div>

        </div>

    </div>


   
<?php
require_once "includes/footer.php";
?>


