<?php
session_start();
include "../config.php";
$password = $_POST['password']; //get password of user
$email = $_POST['email']; //get email 
//find users by email and password
$user = User::find(array('user_email' => $email, 'password' => $password));
if ($user) {
    //go to user.php if true
    $_SESSION['name'] = $user->name_user;
    $_SESSION['user_id'] = $user->user_id;
    header('location: ../view/user.php');
} else {
    //show msg if any error in credentials
    $msg = "invalid credentials";
    header("location: ../view/login_users.php?msg=$msg");
}
