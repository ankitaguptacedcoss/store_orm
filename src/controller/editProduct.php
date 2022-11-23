<?php
session_start();
include "../config.php";
$id = $_POST['edit'];
$_SESSION['prod_id']=$id;
$del = Product::find_by_product_id($id);
$_SESSION['name']= $del->product_name;
$_SESSION['category']=$del->product_category;
$_SESSION['quantity']= $del->product_quantity;
$_SESSION['price']= $del->product_price;
$_SESSION['image']=$del->product_image;
header("location:../view/updateproduct.php");

