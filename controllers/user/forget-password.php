<?php

use APP\traits\Mail;
use APP\src\User;

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $email = $_POST['email'];
    // check if there is an email like this or not
    if(User::user_info($pdo, $email))
    {
        $_SESSION['clientEmail'] = $_POST['email'];
    
        $randum = randum();
        $_SESSION['code'] = $randum;
    
        Mail::send_email($email,"", "forget password code","<h1>$randum</h1>");
    
        header("location:?page=checkCode&typeAuth=change-pass");
        exit();

    }else{
        setMessage('NO ACCOUNT FOR THIS EMAIL', "danger");
        header("location:?page=forget-password");
        exit();
    }
}



// recieve code

if((int)$_GET['statusChangePass'] == 1)
{
    header("location:?page=reset-password");
}

