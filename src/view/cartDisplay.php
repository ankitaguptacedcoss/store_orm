<?php
session_start();
include "../config.php"; //including connection file
$user_id = $_SESSION['user_id']; //getting id of user logged in
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
            <a class="nav-link" href="../view/previousOrder.php" name="category_nav">Previous Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controller/emptycart.php" name="category_nav"><i class="bi bi-bag-x"></i><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bag-x" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z" />
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
              </svg></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end of navbar -->
  <div class="row my-2 mx-2">
    <div class="col-md-8">
      <?php echo "<h3> Hello " . $_SESSION['name'] . " !! </h3>"; //displaying user name

      $msg = $_REQUEST['msg'];
      echo "<p class='msg'>" . $msg . "</p>";  //displaying msg according to option
      ?>
      <script>
        $(".msg").hide("50000");
      </script>
    </div>
    <div class="col-md-2">
      <?php echo "<form action='../view/logout.php'><button type=''submit' class=' btn btn-dark '>Log Out </button></form>";
      ?>
    </div>
    <div class=col-md-2>
      <?php
      echo "<form method='post' action='../view/checkout.php'><button type='submit' class='btn btn-dark  ' value='$v->order_id' name='deleteorder'>Check Out</button></form>";
      ?>
    </div>
  </div>
  </div>
  <?php
  $checkout = 0; //variable to store checkout amt
  echo '<section ">';
  //query to display cart 
  $order_user = Order::find_by_sql("select * from `orders` where user_id ='$user_id' and status ='pending' ");
  echo '<div class="text-center container   py-5">';
  if (empty($order_user)) {
    echo '<h4 class="mt-2 mb-3"><strong>Your Cart is empty !!</strong></h4>';
  } else {
    echo '<h4 class="mt-2 mb-3"><strong>Your Cart !!</strong></h4>';
  }
  echo ' <div class="row mt-2">';
  //display users cart
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
    echo "<a href='../controller/decquan.php?id=$v->order_id'><button  id='decquan' class='btn btn-outline-danger' id='$v->order_id' name='addq'>-</button></a>";
    echo "<span class='quan mx-2' id='quan'>$v->order_quantity</span>";
    echo "<a href='../controller/addquan.php?id=$v->order_id'><button class='btn btn-outline-danger addquan '  value='$v->order_id' name='addq'>+</button></a><br><br>";
    echo "<form method='post' action='../controller/deleteorder.php'><button type='submit' class='btn btn-outline-danger' value='$v->order_id' name='deleteorder'><i class='bi bi-trash'></i><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
          </svg></button></form>";
    echo  "</div>";
    echo '</div>';
    echo  '</div>';
    //calculating total amount as per quantity
    $total_amt = $v->total_amount * $v->order_quantity;
    $checkout = $checkout + $total_amt;
    echo '</div>';
  }
  echo    '</div>';
  echo    '</div>';
  if ($checkout != 0) {
    echo "<div class='ms-2 fs-lighter'><h3>Your Total  :   Rs. $checkout</h3></div>"; //displaying checkout amt
  }
  echo '</section>';
  ?>

</body>

</html>