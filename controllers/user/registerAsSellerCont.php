<?php

use APP\src\User;

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

$phone = $_POST['phone'];
$user_info = (User::user_info($pdo, $_SESSION['user']['email']));
// var_dump($user_info);
// var_dump($phone);
// exit();
if($phone == $user_info['phone'] && $phone == "1025331550")
{
    User::user_modify($pdo,"rule", "admin" , $_SESSION['user']['user_id']);
    header("location:?page=home");
    setMessage("allowed");
    exit();
}else{
    setMessage("forbeden",'danger');
    header("location:?page=home");
    exit();
}

}