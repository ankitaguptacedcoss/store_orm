<?php
include "../config.php";
$id = $_POST['delete'];
$del = Product::find_by_product_id($id);
$del->delete();
header("location:../view/product_display.php");

