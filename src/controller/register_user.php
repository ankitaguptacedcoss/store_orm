<?php
include "../config.php"; 
$uname=$_POST["uname"]; //getting user name
$uemail=$_POST["uemail"];  //getting email
$upassword=$_POST["upassword"]; //getting password
$uaddress=$_POST["uaddress"]; //getting address
//insert into users table 
$user = User::create(array('name_user' => $uname, 'user_email' => $uemail,'password' =>$upassword,'address' =>$uaddress));
if($user){
    header("location: ../view/login_users.php");
}
else{
    //validation for empty value and show error msg
    if(empty($uname)||empty($uemail)||empty($upassword)||empty($uaddress)){
        $msg="Fields cannot be empty";
        header("location: ../view/register_user.php?msg=$msg");
    }
   
}
