<?php
session_start();
include "../config.php";
$user_id= $_SESSION['user_id']; //getting user id 
//query to find order for particular order
$order_user =Order::find('all', array('conditions' => array('user_id' => $user_id,'status' =>'pending' ,'order_id' =>$_REQUEST['id'])));
$quan=$order_user[0]->order_quantity;
if($quan>1){
    //decrease quantity if it is greater than 1
    $quan -= 1;
     $order_user[0]->order_quantity=$quan; 
}else{
    if($quan<=1){
        //delete if it is less than 1
        $order_user[0]->delete();
    }
}
//save updated data
$order_user[0]->save();
 header("location: ../view/cartDisplay.php");

?>