<?php

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $code = (int)$_POST['code'];

    if($code === $_SESSION['code'])
    {
        if((string)$_REQUEST['typeAuth'] == "register")
        {
            header("location:?page=registerController&statusRegister=1");
            exit();
        }elseif((string)$_REQUEST['typeAuth'] == "login"){
            header("location:?page=loginController&statusLogin=1");
            exit();
        }elseif((string)$_REQUEST['typeAuth'] == "change-pass"){
            header("location:?page=forget-password-controller&statusChangePass=1");
            exit();
        }
    }else{
        setMessage("invalide code","danger");
        header("location:?page=checkCode");
    }
}