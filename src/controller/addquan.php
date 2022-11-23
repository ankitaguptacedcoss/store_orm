<?php
session_start();
include "../config.php"; //including connection file
$user_id = $_SESSION['user_id']; //getting user id
//thsi will find the order for particular order id
$order_user = Order::find('all', array('conditions' => array('user_id' => $user_id, 'status' => 'pending', 'order_id' => $_REQUEST['id'])));
$quan = $order_user[0]->order_quantity; //store quantity of order
$quan += 1; //increase quantity by 1
//update and save in table
$order_user[0]->order_quantity = $quan;
$order_user[0]->save();
header("location: ../view/cartDisplay.php");
