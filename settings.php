<?php
session_start();
require_once 'includes/header.php';
require_once 'db.php';


 $select_query="SELECT * FROM text_settings";


$all_settings_data_from_db=mysqli_query($db_connect,$select_query);
?>

   <div class="card ">
                <div class="card-header text-white bg-info text-center">settings</div>
                <div class="card-body">

                <?php if(isset($_SESSION['status'])):?>
               <div class="alert alert-success">
                   <?=$_SESSION['status'];?>
                   <?php unset($_SESSION['status']);?>
               </div>

               <?php 
            endif; 
            ?>
                    <form action="settings_post.php" method="POST" >

                       <?php foreach($all_settings_data_from_db as $settings):?>
                        <div class="form-group">
                            <label><?=$settings['settings_name']?></label>
                            <input type="text" class="form-control" name="<?=$settings['settings_name']?>" value="<?=$settings['settings_value']?>">
                        </div>
                       <?php endforeach;?>

                        </div>


                        <button type="submit" class="btn btn-primary">update now</button>
                    </form>
                </div>
            </div>

        </div>


<?php
require_once 'includes/footer.php';
?>
