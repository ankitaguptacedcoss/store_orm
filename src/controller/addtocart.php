<?php
session_start();
include "../config.php";
  $user_id= $_SESSION['user_id']; //getting user id who logged in
  $product_id= $_POST['add']; // getting product id
  $product = Product::find_by_product_id($product_id); //finding product with prodict id
  $user = User::find_by_user_id($user_id); //finding user from id
  //finding if product already exists in orders table and will take count
  $count=Order::count(array('conditions' => array('user_id' => $user_id,'status' =>'pending','product_id'=>$product_id)));
  //check if count =1 then will increase quantity
 if($count==1){
  $quan=$order_user[0]->order_quantity;
  $quan += 1;
   $order_user[0]->order_quantity=$quan;
   $order_user[0]->save();
   $msg="quantity added  !!";
   header("location:../view/user.php?msg=$msg");
 }

else{
  //product doesn't exists then add to cart
  $order = Order::create(array('user_id' => $user->user_id, 'product_id' => $product_id,'total_amount' =>$product->product_price,'shipping_address' => $user->address,'order_date' =>  date("Y-m-d"),'delivery_date' => date("Y-m-d"),'order_quantity' => 1,'status' =>'pending','product_name' =>$product->product_name,'product_image' =>$product->product_image));
  $msg="product added successfully !!";
  header("location:../view/user.php?msg=$msg");
}
