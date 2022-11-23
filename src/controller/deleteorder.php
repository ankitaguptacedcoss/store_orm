<?php
session_start();
include "../config.php";
$id=$_POST['deleteorder']; //geeting order id
$user_id= $_SESSION['user_id']; //getting user id
$del = Order::find_by_order_id($id); 
//delete according to order id
$del->delete();
header("location:../view/cartDisplay.php");
?>