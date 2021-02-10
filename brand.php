


<?php
session_start();

require_once "db.php";
require_once "includes/header.php";
require_once "nav.php";
$email_address = $_SESSION['email_address_from_login_page'];
 $select_query = "SELECT * FROM brands";
 $all_brands_from_database = mysqli_query($db_connect,$select_query);

// print_r($all_services_from_database -> num_rows);
?>
<div class="row mt-3">
    <div class="col-lg-7 ml-2">

        <div class="card mb-3">
            <div class="card-header text-white bg-info text-center">brand list</div>
            <div class="card-body">

<table class="table">
        <thead>
                 <tr>
                    <th scope="col">id</th>
                    <th scope="col">brand_image</th>
                    <th scope="col">satus</th>
               
                 </tr>
        </thead>
        <tbody>

              <?php
             
              foreach($all_brands_from_database as $brand):
              ?>

            <tr>
                <td><?=$brand['id']?></td>
                <td><img src="image/brand_image/<?=$brand['brand_image_name']?>" alt=""></td>
                <td><?=$brand['status']?></td>

                <td>
                <?php if($brand['status']=='active'): ?>
                    <span class="badge badge-success"><?=$brand['status']?></span>
                      <a href="change_brand_status.php?id=<?=$brand['id']?> brand_image=<?=$brand['brand_image_name']?>&what_to_do=deactive" type="button" class="btn btn-info btn-sm p-10">make as deactive</a>
                     
                    <?php else:?>
                    <span class="badge badge-danger">
                    <?= $brand['status']?>
                    </span>
                    <a href="change_brand_status.php?id=<?=$brand['id']?>brand_image=<?=$brand['brand_image_name']?>&what_to_do=active" type="button" class="btn btn-warning btn-sm p-10">make as active</a>
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
                <div class="card-header text-white bg-info text-center">ADD BRANDS</div>
                <div class="card-body">

                <?php if(isset($_SESSION['status'])):?>
               <div class="alert alert-success">
                   <?=$_SESSION['status'];?>
                   <?php unset($_SESSION['status']);?>
               </div>

               <?php 
            endif; 
            ?>
                    <form action="brand_post.php" method="POST" enctype="multipart/form-data">


                        <div class="form-group">
                            <label>brand image</label>
                            <input type="file" class="form-control" name="brand_image">
                        </div>
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


