<?php

ob_start();

session_start();
// db confige
require("confige/confige.php");

require("vendor/autoload.php");

// get functions file
require("core/functions.php");

use APP\src\Database;



// get dynamic class file
// spl_autoload_register(function($class)
//     {
//         $class = str_replace("\\","/",$class);
//         require($class.".php");
//     }
// );


// database connection
$pdo = Database::Instance(DB_INFO)->pdo();

// message to sure the action if done successfully
getMessage();

// get target page 
$page = $_GET['page'] ?? "home";

// header section
if(($page == "login") || ($page == "register") || ($page == "admin")){
    
}else{
    require_once("views/user/layouts/header.php");
}

// switch between the pages according the url coming
switch($page)
{
    // admin dashboard
    case "admin" : header("location:adminIndex.php") ;
    exit();
    break;

    // user dashboard
    case "home" : require("views/user/layouts/home.php") ;
    break;

    case "login" : require("views/user/auth/login.php") ;
    break;

    case "register" : require("views/user/auth/register.php") ;
    break;

    case "forget-password" : require("views/user/auth/forget-password.php") ;
    break;

    case "forget-password-controller" : require("controllers/user/forget-password.php") ;
    break;
    
    case "reset-password" : require("views/user/auth/reset-password.php") ;
    break;
    
    case "reset-password-controller" : require("controllers/user/reset-password.php") ;
    break;

    case "registerController" : require("controllers/user/registerController.php") ;
    break;

    case "loginController" : require("controllers/user/loginController.php") ;
    break;

    case "checkCodeController" : require("controllers/user/checkCodeController.php") ;
    break;

    case "checkCode" : require("views/user/auth/checkCode.php") ;
    break;

    case "logout" : require("controllers/user/logout.php") ;
    break;

    case "my-account" : require("views/user/my-account.php") ;
    break;


    case "registerAsSeller" : require("views/user/auth/registerAsSeller.php") ;
    break;

    case "registerAsSellerCont" : require("controllers/user/registerAsSellerCont.php") ;
    break;


    default: require("views/404.php");
}

// footer section
if(($page == "login") || ($page == "register") || ($page == "admin")){
    
}else{
    require_once("views/user/layouts/footer.php");
}

ob_end_flush();
?>