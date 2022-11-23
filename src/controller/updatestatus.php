<?php
include "../config.php";
$order_id = $_POST['status']; //getting order id
$status = $_POST['gstatus']; //getting status from dropdown
$order = Order::find_by_order_id($order_id); //find order by order id
if ($order->status == "Delivered") {
    //show alert if status is already delivered and admin trying to change status
    echo "<script>alert('Pls notice : order is already delivered ' )</script>";
    echo "<script>window.location.href='../view/show_order.php'</script>";
} else {
    //else update status
    $order->status = $status;
    $order->save();
    echo "<script>window.location.href='../view/show_order.php'</script>";
}
