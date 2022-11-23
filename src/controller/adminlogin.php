<?php
include "../config.php";
$password=$_POST['password']; //getting password
$email=$_POST['email']; //getting email
if($password=='123' && $email=='admin@store.com'){
    header("location:../view/admin.php");
}
else{
    $msg="invalid credentials";
    header("location:../view/login_admin.php?msg=$msg");
}
