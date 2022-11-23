<?php
session_start();
include "../config.php";
 $user_id=$_SESSION['user_id']; //getting user id
 //delete all orders in cart
 Order::delete_all(array('conditions' => array('user_id' => $user_id,'status' =>'pending')));
header("location: ../view/cartDisplay.php");
?>