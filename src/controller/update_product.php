<?php
session_start();
include "../config.php";
$product_name = $_POST['product_name']; //get product name
$product_price = $_POST['product_price']; //get product price
$product_stock = $_POST['product_stock']; //get product stock
$product_category = $_POST['product_category']; //get product category 
$prev_img = $_SESSION['image']; //geeting previous image name already in database
$id = $_SESSION['prod_id']; //getting product id
;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//image upload
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
    $images = htmlspecialchars(basename($_FILES["fileToUpload"]["name"])); //get updated image
  }
}
//get product by product id
$prod_update = Product::find_by_product_id($id);
//update values 
$prod_update->product_category = $product_category;
$prod_update->product_name = $product_name;
$prod_update->product_price =  $product_price;
$prod_update->product_quantity = $product_stock;
if (empty($images)) {
  //if image is empty then update to previous img
  $images = $prev_img;
  $prod_update->product_image = $images;
} else {
  //update image
  $prod_update->product_image = $images;
}
//update values
$prod_update->save();
if ($prod_update) {
  header("location:../view/product_display.php");
} else {
  $msg = "error updating product";
  header("location:../view/updateproduct.php.php?msg=$msg");
}
