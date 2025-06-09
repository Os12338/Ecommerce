<?php

use APP\src\Validation; 
use APP\src\User; 

use APP\traits\Mail;

if($_SERVER['REQUEST_METHOD'] === "POST")
{

    $email = Validation::EMAIL($_POST['email']);
    $pass = Validation::PASS($_POST['password']);


    if($email && $pass)
    {
        if($result = User::login($pdo, $email, $pass))
        {
            // there is an issue Because Password save in session will fix later
            // but make this for keep user info for use it after check the code
            $_SESSION["user_info"] = ['id'=>$result['user_id'], 'name'=>$result['user_name'],'email'=>$email, 'rule'=>$result['rule'], 'phone'=>$result['phone']];

            if(password_verify($pass,$result['password']))
            {
                // check if he is an admin
                if((User::user_info($pdo, $email))['rule'] === "admin")
                {
                    $_SESSION['user']["rule"] = "admin";
                }

                $randum = randum();
                $_SESSION['code'] = $randum;
                Mail::send_email($email,$result['user_name'] , "login alarm","<h1>$randum</h1>");
                header("location:?page=checkCode&typeAuth=login");
                exit();
            //     setMessage("Login successfully");
            }else{
                setMessage("invalid password","danger");
                header("location:?page=login");
                exit();
            }
        }else{
            setMessage("No acount for this email","danger");
            header("location:?page=register");
            exit();
        }
    }else{
        header("location:?page=login");
        setMessage(Validation::$ERRORS,"danger");
        exit();
    }
}

if((int)$_GET['statusLogin'] == 1)
{
    $_SESSION['user']['user_id'] = $_SESSION['user_info']['id'] ; 
    $_SESSION['user']['email'] = $_SESSION['user_info']['email']; 
    $_SESSION['user']['user_name'] = $_SESSION['user_info']['name'];
    $_SESSION['user']['phone'] = $_SESSION['user_info']['phone'];
    $_SESSION['user']['rule'] = $_SESSION['user_info']['rule'];

    unset($_SESSION['user_info']);
    User::user_modify($pdo,"status", 1 , $_SESSION['user']['user_id']);
    header("location:?page=home");
    setMessage("login successfully");
    exit();
}