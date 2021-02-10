<?php
require_once "includes/header.php";

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">KUFA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reg.php">reg</a>
      </li>
     <?php   
if(!isset($_SESSION['login_status'])):
?>

      <li class="nav-item">
        <a class="nav-link" href="login.php">login</a>
      </li>
<?php endif;?>
     

      
<?php   
if(isset($_SESSION['login_status'])):
?>

<li class="nav-item">
        <a class="nav-link" href="dash_board.php">dashboard</a>
      </li>

<li class="nav-item">
        <a class="nav-link" href="user_list.php">user_list</a>
      </li>


      <li class="nav-item">
        <a class="nav-link " href="services.php">services</a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="settings.php">set</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="brand.php">brand</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="profile.php">profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="portfolio.php">portf</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-sm btn-danger text-white" href="log_out.php">log_out</a>
      </li>
      
      <?php endif;?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php
require_once "includes/footer.php";

?>