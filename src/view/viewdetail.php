<?php
session_start();
?>
<?php
include "../config.php";
$id = $_POST['detail']; //get id of product
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
    .msg {
      background-color: lightseagreen;
      padding: 20px;

    }
  </style>
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
            <a class="nav-link" href="../view/user.php">All Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/userEnd.php?id=Clothes" name="category_nav">Clothes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/userEnd.php?id=Electronics" name="category_nav">Electronics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/previousOrder.php" name="category_nav">Previous Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/cartDisplay.php"><i class="bi bi-bag-fill"></i><svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
              </svg></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end of navbar -->
  <!-- display prdoucts -->
  <div class="row my-2 mx-2">
    <div class="col-md-8">
      <?php echo "<h3> Hello " . $_SESSION['name'] . " !!! </h3>";
      ?>
      <div class="col-md-4">
        <?php echo "<form action='../view/logout.php'><button type=''submit' class='btn btn-outline-dark '>Log Out </button></form>"; ?>
      </div>

    </div>
    <?php
    echo '<section style="background-color: #eee;">';
    echo '<div class="text-center container   py-5">';
    echo '<h4 class="mt-4 mb-5"><img src="../images/store.jpg" width="80px"/></h4>';
    echo ' <div class="row mt-2">';
    //query to fetch product according to product id (for single product dispaly)
    $v = Product::find_by_product_id($id);
    echo '<div class="card  my-2 " style="width:600px; margin-left:300px;" >';
    echo  '<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">';
    echo "<div style='width:340px;margin-left:80px'> <img src='../controller/uploads/" . $v->product_image . "' class='card-img-top mt-3' width='320px' height='290px;'/> </div>";
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
    echo    '<div class="d-flex justify-content-center"><h5 class="card-title mb-3">' . $v->product_name . '</h5>';
    echo   '</a>';
    echo   '<h6 class="mb-3 ms-5"> Price : $' . $v->product_price . '</h6></div>';
    echo '<div><span> Dual Sim, 4G, 5G, VoLTE, Wi-Fi.</span>';
    echo '4 GB RAM, 64 GB inbuilt.<br>';
    echo '5000 mAh Battery.<br>';
    echo ' 6.52 inches, 720 x 1600 px Display with Water Drop Notch.<br>';
    echo '12 MP Quad Rear & 8 MP Front Camera.<br><br>';
    echo '</div>';
    echo "<form method='post' action='../controller/addtocart.php'><button type='submit' class='btn btn-outline-primary' value='$v->product_id' name='add'>ADD to Cart</button></form><br>";
    echo  '</div>';
    echo '</div>';
    echo    '</div>';
    echo    '</div>';
    echo '</section>';
    ?>
</body>

</html>