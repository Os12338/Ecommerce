<?php

use APP\src\Validation;
use APP\src\User;


// recieve new password
if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $pass = $_POST['password'];

    if($pass)
    {
        $hashed_pas = password_hash(Validation::PASS($_POST['password']),PASSWORD_DEFAULT);

        $result = User::user_modify_by_email($pdo,"password",$hashed_pas,$_SESSION['clientEmail']);
        if($result)
        {
            header("location:?page=login");
            setMessage("Reset successfully");
            exit();
        }
    }else{
        header("location:?page=reset-password");
        setMessage(Validation::$ERRORS,"danger");
        exit();
    }
}