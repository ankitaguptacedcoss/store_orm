<?php
include "../config.php";
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
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php"><img src="../images/store.jpg" height=80px; /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="../view/show_order.php">show orders</a>
          <a class="nav-link" href="../view/product_display.php">show Products</a>
          <a class="nav-link" href="../view/user_display.php">show Users</a>
          <a class="nav-link" href="../view/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- end of navbar -->
  </div>
  <?php
  echo '<section style="background-color: #eee;">';
  echo '<div class="text-center container   py-5">';
  echo '<div class=" d-flex justify-content-around"><h4 class=" mb-2"><strong> All Orders !!</strong></h4>';
  echo '<a href="../view/show_order.php">View Recent orders</a></div>';
  echo ' <div class="row mt-2">';
  // query to find all orders 
  $order_user = Order::find('all');
  //loop to display orders
  foreach ($order_user as $k => $v) {
    echo '<div class="card col-4" >';

    echo  '<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
       data-mdb-ripple-color="light">';
    echo " <img src='../controller/uploads/" . $v->product_image . "' class='card-img-top mt-3' width='90px' height='200px;'/> ";
    echo   '<a href="#!">';

    echo  '<div class="hover-overlay">';
    echo   '<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>';
    echo  '</div>';
    echo    '</a>';
    echo  '</div>';
    echo   '<div class="card-body">';
    echo   '<a href="" class="text-reset">';
    echo    '<h5 class="card-title mb-3">' . $v->product_name . '</h5>';
    echo   '</a>';
    echo   '<h6 class="mb-3"> Price : $' . $v->total_amount . '</h6>';
    echo   '<h6 class="mb-3"> Status of Order : ' . $v->status . '</h6>';

    echo "<span class='quan'>Quantity Ordered:$v->order_quantity</span>";
    echo "<br><br>";
    echo "<form action='../controller/updatestatus.php' method='post'><select class='bg-dark p-2 text-light' name='gstatus'>";
    echo "<option>Pending</option>";
    echo "<option>Approved</option>";
    echo "<option>Out for Delivery</option>";
    echo "<option>Delivered</option>";
    echo "</select>";
    echo "<button class='btn btn-dark ms-3' value='$v->order_id' name='status' >Update Status</button></form>";
    echo  '</div>';
    echo '</div>';
  }
  echo    '</div>';
  echo    '</div>';
  echo '</section>';

  ?>
</body>

</html>