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
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="py-5 text-center">

      <h2>Checkout </h2>
      <p class="lead"></p>
    </div>
    <?php
    //user orders
    $order_user = Order::find_by_sql("select * from `orders` where user_id ='$user_id' and status='pending' ");
    ?>
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <?php
          $checkout = 0;
          foreach ($order_user as $k => $v) {
            echo '<li class="list-group-item d-flex justify-content-between lh-condensed">';
            echo  '<div>';
            echo '<h6 class="my-0">' . $v->product_name . '</h6>';
            echo '<span class="text-muted">Q : ' . $v->order_quantity . '</span>';
            echo ' </div>';
            echo '<span class="text-muted">Rs ' . $v->total_amount . '</span>';
            echo  '</li>';
            $total_amt = $v->total_amount * $v->order_quantity;
            $checkout = $checkout + $total_amt;
          }
          ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (Rs.)</span>
            <strong>Rs. <?php echo $checkout; ?></strong>
          </li>
        </ul>

      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <!-- form to take users details -->
        <form class="needs-validation" novalidate method="post" action="../controller/checkoutorder.php">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="name">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>
          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required name="address1">
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>
          <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" name="address2">
          </div>
          <h4 class="mb-3">Payment</h4>
          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required name="payment">
              <label class="custom-control-label" for="credit">Credit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required name="payment">
              <label class="custom-control-label" for="debit">Debit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required name="payment">
              <label class="custom-control-label" for="paypal">PayPal</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required name="card">
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required name="card_no">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required name="card_date">
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required name="cvv">
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>