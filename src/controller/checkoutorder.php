<?php
session_start();
//geeting values from user for checkout
$user_id=$_SESSION['user_id'];
include "../config.php";
$name=$_POST['name'];
$email=$_POST['email'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$payment=$_POST['payment'];
$card=$_POST['card'];
$card_no=$_POST['card_no'];
$card_date=$_POST['card_date'];
$cvv=$_POST['cvv'];
$order_user =Order::find('all', array('conditions' => array('user_id' => $user_id,'status' =>'pending' )));
if(empty($order_user)){
    //if cart is empty show an alert 
    $msg="<script>alert('Your cart is empty')</script>";
    header("location: ../view/cartDisplay.php?msg=$msg") ;
}else{
    //change the order status as confirmed 
    foreach($order_user as $k=>$v){
        $v->status="confirmed";
        $order_user[$k]->save();
    }
    $msg="<script>alert('Your order has been placed')</script>";
    header("location: ../view/orderplaced.php?msg=$msg");
}
