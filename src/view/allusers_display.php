<?php
session_start();
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
  echo '<div class=" d-flex justify-content-around"><h4 class=" mb-2"><strong> All Users !!</strong></h4>';
  echo '<a href="../view/user_display.php">Recent Users</a></div>';
  echo ' <div class="row mt-2">';
  //query to display users
  $users = User::find('all', array('order' => 'user_id desc'));
  //loop to display users 
  foreach ($users as $k => $v) {
    echo '<div class="card " style="width:500px;" >';
    echo  '<div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
       data-mdb-ripple-color="light">';
    echo   '<a href="#!">';
    echo  '<div class="hover-overlay">';
    echo   '<div class="mask" style="background-color: blue;"></div>';
    echo  '</div>';
    echo    '</a>';
    echo  '</div>';
    echo   '<div class="card-body" >';
    echo   '<a href="" class="text-reset">';
    echo    '<h5 class="card-title mb-3">Users Id : ' . $v->user_id . '</h5>';
    echo   '</a>';
    echo   '<h6 class="mb-3"> User Name :' . $v->name_user . '</h6>';
    echo   '<h6 class="mb-3">User Email :  ' . $v->user_email . '</h6>';
    echo "<span class='quan'>User Address :   $v->address</span>";

    echo  '</div>';
    echo '</div>';
  }
  echo    '</div>';
  echo    '</div>';
  echo '</section>';
  ?>
</body>

</html>