<?php

use APP\src\User;
use APP\src\Validation;

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $user_id = $_POST['id'];
    $user_name = Validation::STRING($_POST['name']);
    $email = Validation::EMAIL($_POST['email']);
    $phone = $_POST['phone'];

    $user = ['user_name'=>$user_name,'email'=>$email,'phone'=>$phone];

    foreach($user as $key => $value)
    {
        $result = User::user_modify($pdo, $key, $value, $user_id);
    }

    if($result)
    {
        setMessage("Udate successfully");
        if($_SESSION['user']['user_id'] == $id)
        {
            unset($_SESSION['user']);
            session_destroy();
            header('location:?page=gest');
            exit();
        }
        header('location:?page=users');
        exit();
    }

}
