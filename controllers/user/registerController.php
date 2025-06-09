<?php

use APP\src\Validation; 
use APP\src\User; 
use APP\traits\Mail;


if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $user_name = Validation::STRING($_POST['name']);
    $email = Validation::EMAIL($_POST['email']);
    $pass = password_hash(Validation::PASS($_POST['password']),PASSWORD_DEFAULT);
    $phone = $_POST['phone'];

    // check if the user already have an account
    if(!(User::user_info($pdo, $email)))
    {
        // check if he is an admin
        if((User::user_info($pdo, $email))['rule'] === "admin")
        {
            $_SESSION['user']["rule"] = "admin";
        }

        $_SESSION["user_info"] = ['name'=>$user_name,'email'=>$email, 'phone'=>$phone, 'pass'=>$pass];

        if($user_name && $email && $pass && $phone)
        {
            // create randum code for verification and send to client email
            $randum = randum();
            $_SESSION['code'] = $randum;
    
            Mail::send_email($email, $user_name, "Registeration alarm","<h1>$randum</h1>");
    
            header("location:?page=checkCode&typeAuth=register");
            exit();
    
        }else{
            header("location:?page=register");
            setMessage(Validation::$ERRORS,"danger");
            exit();
        }
    }else{
        setMessage("this account already exist", "danger");
        header("location:?page=login");
        exit();
    }

}

// recieve resutl from  checkCodeController

if((int)$_GET['statusRegister'] == 1)
{
    if(User::register($pdo, $_SESSION['user_info']['name'], $_SESSION['user_info']['email'], $_SESSION['user_info']['phone'], $_SESSION['user_info']['pass']))
    {
        unset($_SESSION['user_info']);
        // add status that he is login
        User::user_modify($pdo,"status", 1 , $_SESSION['user']['user_id']);
        header("location:?page=home");
        setMessage("Registered successfully");
        exit();
    }else{
        header("location:?page=register");
        setMessage("Error","danger");
        exit();
    }
}

