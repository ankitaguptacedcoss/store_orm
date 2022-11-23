
<?php
include "../config.php";

$category= $_REQUEST['id'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body>
<!-- start of navbar -->
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../images/store.jpg" height="80px;"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../view/user.php">All Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../view/userEnd.php?id=Clothes"  name="category_nav">Clothes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../view/userEnd.php?id=Electronics"  name="category_nav">Electronics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../view/logout.php">Logout</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
   <!-- end of navbar -->
   <!-- display prdoucts -->
<?php
   echo '<section style="background-color: #eee;">';
   echo '<div class="text-center container   my-5 py-5">';
   echo '<h4 class="mt-4 mb-5"><strong>Store</strong></h4>';
     echo ' <div class="row mt-2">';
     $cloth = Product::find('all',array('conditions' => array('product_category=?',$category)));
foreach($cloth as $k=>$v){
  echo '<div class="card  my-2 col-4 " style="height:530px width:200px;">';
       
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
     echo    '<h5 class="card-title mb-3">'.$v->product_name.'</h5>';
    echo   '</a>';
   echo    '<a href="" class="text-reset">';
       echo  '<p>'.$v->product_category.'</p>';
    echo   '</a>';
    echo   '<h6 class="mb-3">$'.$v->product_price.'</h6>';
    echo   '<h6 class="mb-3">Stock :'.$v->product_quantity.'</h6>';
    echo "<form method='post' action='../controller/addtocart.php'><button type='submit' class='btn btn-outline-primary' value='$v->product_id' name='add'>ADD to Cart</button></form><br>";
    echo "<form method='post' action='../controller/viewdetail.php'><button type='submit' class='btn btn-outline-primary' value='$v->product_id' name='detail'>View Detail</button></form><br>";
   echo  '</div>';
  echo '</div>';
}
echo    '</div>';
echo    '</div>';
echo '</section>';     

?>
</body>
</html>