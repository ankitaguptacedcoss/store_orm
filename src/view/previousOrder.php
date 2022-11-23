<?php
session_start();
include "../config.php";
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            <a class="nav-link" href="../view/cartDisplay.php"><i class="bi bi-bag-fill"></i><svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
              </svg></a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- end of navbar -->
  <div class="row my-2 mx-2">
    <div class="col-md-8">
      <?php echo "<h3> Hello " . $_SESSION['name'] . " !! </h3>";
      ?>
    </div>
    <div class="col-md-2">
      <?php echo "<form action='../view/logout.php'><button type=''submit' class=' btn btn-dark '>Log Out </button></form>";
      ?>
    </div>
  </div>
  </div>
  <?php
  echo '<section ">';
  echo '<div class="text-center container   py-5">';
  echo '<h4 class="mt-2 mb-3"><strong>Your Orders !!</strong></h4>';
  echo ' <div class="row mt-2">';
  //query to fetch all orders of users
  $order_user = Order::find_by_sql("select * from `orders` where user_id ='$user_id' and status IN('confirmed','approved' ,'out for delivery')");
  foreach ($order_user as $k => $v) {
    echo '<div class="card col-3 ms-5"  >';
    echo '<div class="d-flex">';
    echo  '<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
       data-mdb-ripple-color="light">';
    echo " <div class='d-flex'><img src='../controller/uploads/" . $v->product_image . "' class='card-img-top mt-3' width='90px' height='200px;'/> ";

    echo  '</div>';
    echo   '<div class="card-body">';
    echo    '<div mt-3"><h5 class="card-title mb-2">' . $v->product_name . '</h5>';
    echo   '<h6 class="mb-5"> Price : Rs ' . $v->total_amount . '</h6></div>';
    echo   '<h6 class="mb-3"> Order status: ' . $v->status . '</h6>';
    echo "<span class='quan mx-2' id='quan'>Quantity Ordered  :" . $v->order_quantity . "</span>";
    echo  "</div>";
    echo '</div>';
    echo  '</div>';
    echo '</div>';
  }
  echo    '</div>';
  echo    '</div>';
  echo '</section>';
  ?>

</body>

</html>