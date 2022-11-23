<?php
require_once 'libraries/php-activerecord/ActiveRecord.php';
 ActiveRecord\Config::initialize(function($cfg)
 {
     $cfg->set_model_directory('Model');
     $cfg->set_connections(array(
        'development' => 'mysql://root:secret@mysql-server/store'));
 });

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
     <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="./images/store.jpg" height=60px; /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item  text-dark">
            <a class="nav-link active text-dark" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-dark" href="./view/login_admin.php"> Admin Login</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-dark" href="./view/login_users.php"> User Login</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-dark" href="./view/register_user.php">Register User</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<?php
echo '<section style="background-color: #eee;">';
echo '<div class="text-center container my-5  py-5">';
echo '<div class=" d-flex justify-content-around "><h4 class=" mb-2"><img src="./images/store.jpg" height=80px;/></div>';

  echo ' <div class="row mt-2">';
  $user_n=Product::find('all');
  //display all products
foreach($user_n as $k=>$v){
    echo '<div class="card  my-2 col-3 ms-5"  >';
     echo  '<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
         data-mdb-ripple-color="light">';
         echo " <img src='../controller/uploads/" . $v->product_image . "' class='card-img-top mt-3' width='320px' height='200px;'/> ";
       echo   '<a href="#!">';
         echo   '<div class="mask">';
         echo     '<div class="d-flex justify-content-start align-items-end h-100">';
              echo  '<h5><span class="badge bg-primary ms-2">New</span></h5>';
          echo    '</div>';
        echo    '</div>';
          echo  '<div class="hover-overlay">';
           echo   '<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>';
          echo  '</div>';
      echo    '</a>';
      echo  '</div>';
     echo   '<div class="card-body">';
       echo   '<a href="" class="text-reset">';
        echo    '<div class="d-flex justify-content-around"><h5 class="card-title mb-3">'.$v->product_name.'</h5>';
       echo   '</a>';
      echo    '<a href="" class="text-reset">';
          echo  '<p>'.$v->product_category.'</p></div>';
       echo   '</a>';
       echo   '<div><h6 class="mb-3">Price :'.$v->product_price.'</h6>';
       echo "<form method='post' action='./view/login_users.php'><button type='submit' class='btn btn-outline-primary p-2' value='$v->product_id' name='edit'>Add to cart</button></form></div>";
      echo  '</div>';
     echo '</div>';
}
echo    '</div>';
echo    '</div>';
 echo '</section>';     
 
 
?>

</body>
</html>