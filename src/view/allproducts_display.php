<?php
//including connection file
include "../config.php";
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
      <a class="navbar-brand" href="#"><img src="../images/store.jpg" height="80px;" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../view/admin.php">Upload Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/product_display.php">All Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/cloth_display.php?id=Clothes" name="category_nav">Clothes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/cloth_display.php?id=Electronics" name="category_nav">Electronics</a>
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
  echo '<div class="text-center container   py-5">';
  echo '<div class=" d-flex justify-content-around"><h4 class=" mb-2"><strong> All Products  !!</strong></h4>';
  echo '<a href="../view/product_display.php">View Recent  Products</a></div>';
  echo ' <div class="row mt-2">';
  // query to find all products
  $user_n = Product::find('all');
  //loop to display products
  foreach ($user_n as $k => $v) {
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
    echo    '<div class="d-flex justify-content-around"><h5 class="card-title mb-3">' . $v->product_name . '</h5>';
    echo   '</a>';
    echo    '<a href="" class="text-reset">';
    echo  '<p>' . $v->product_category . '</p></div>';
    echo   '</a>';
    echo   '<div class="d-flex justify-content-around"><h6 class="mb-3">Price :' . $v->product_price . '</h6>';
    echo   '<h6 class="mb-3">Stock :' . $v->product_quantity . '</h6></div>';
    echo "<div class='d-flex justify-content-around'><form method='post' action='../controller/deleteProduct.php'><button type='submit' class='btn btn-outline-primary p-2 me-3' value='$v->product_id' name='delete'>Delete </button></form><br>";
    echo "<form method='post' action='../controller/editProduct.php'><button type='submit' class='btn btn-outline-primary p-2' value='$v->product_id' name='edit'>Edit Details</button></form></div>";
    echo  '</div>';
    echo '</div>';
  }
  echo    '</div>';
  echo    '</div>';
  echo '</section>';

  ?>


</body>

</html>