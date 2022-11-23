<?php
session_start();
include "../config.php";
$product_name = $_POST['product_name']; //get product name
$product_price = $_POST['product_price']; //get product price
$product_stock = $_POST['product_stock']; //get product stock
$product_category = $_POST['product_category']; //get product category 
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//for file uploading
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $images = htmlspecialchars(basename($_FILES["fileToUpload"]["name"])); //get image of product
  }
}
//insert into products table
$product = Product::create(array('product_name' => $product_name, 'product_image' => $images, 'product_category' => $product_category, 'product_price' => $product_price, 'product_quantity' => $product_stock));
if ($product) {
  //if true redirect to product_display
  header("location:../view/product_display.php");
} else {
  //show msg if any error
  $msg = "error uploading product";
  header("location:../view/admin.php?msg=$msg");
}
