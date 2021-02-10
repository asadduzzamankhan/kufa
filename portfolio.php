


<?php
session_start();

require_once "db.php";
require_once "includes/header.php";
require_once "nav.php";
$email_address = $_SESSION['email_address_from_login_page'];
 $select_query = "SELECT * FROM achivement";
$all_portfolio_from_database = mysqli_query($db_connect,$select_query);
// print_r($all_services_from_database -> num_rows);
?>
<div class="row mt-3">
    <div class="col-lg-6 ml-2">

        <div class="card mb-3">
            <div class="card-header text-white bg-info text-center">achivement</div>
            <div class="card-body">

<table class="table">
        <thead>
                 <tr>
                    <th scope="col">id</th>
                    <th scope="col">portfolio_icon</th>
                    <th scope="col">portfolio_number</th>
                    <th scope="col">portfolio_title</th>
                 </tr>
        </thead>
        <tbody>

              <?php
             
              foreach($all_portfolio_from_database as $port):
              ?>

            <tr>
                <td><?=$port['id']?></td>
                <td><i class="<?=$port['portfolio_icon']?>"></i></td>
                <td><?=$port['portfolio_number']?></td>
                <td><?=$port['portfolio_title']?></td>
            
            </tr>

           <?php
           
              endforeach;
           ?>
        
        </tbody>
</table>



            </div>

        </div>
   </div>



        <div class="col-lg-5 ml-2">

            <div class="card mb-3">
                <div class="card-header text-white bg-info text-center">ADD  PORTFOLIO SERVICE</div>
                <div class="card-body">





                <?php if(isset($_SESSION['status'])):?>
               <div class="alert alert-success">
                   <?=$_SESSION['status'];?>
                   <?php unset($_SESSION['status']);?>
               </div>

               <?php 
            endif; 
            ?>
                    <form action="portfolio_post.php" method="POST">


                        <div class="form-group">
                            <label>portfolio_icon</label>
                            <input type="text" class="form-control" name="portfolio_icon">
                        </div>
                    <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">icon</a>
                        <div class="form-group">
                            <label>portfolio_number</label>
                            <input type="text" class="form-control" name="portfolio_number">

                        </div>

                        <div class="form-group">
                            <label >portfolio_title</label>
                            <textarea name="portfolio_title" class="from-control" rows="4"></textarea>

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


