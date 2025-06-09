<?php

ob_start();

session_start();
// db confige
require("confige/confige.php");

require("vendor/autoload.php");

// get functions file
require("core/functions.php");

use APP\src\Database;

// database connection
$pdo = Database::Instance(DB_INFO)->pdo();

// message to sure the action if done successfully
getMessage();

// get target page 
$page = $_GET['page'] ?? "home";

// header section

    require_once("views/admin/layouts/sidebar.php");


// switch between the pages according the url coming
switch($page)
{
    case "gest" : header("location:index.php") ;
    break;

    case "home" : require("views/admin/home.php") ;
    break;

    case "products" : require("views/admin/products.php") ;
    break;
    
    case "users" : require("views/admin/users.php") ;
    break;
    
    case "userDelete" : require("controllers/admin/userDelete.php") ;
    break;
    
    case "userUdateController" : require("controllers/admin/userUpdate.php") ;
    break;

    case "userUdate" : require("views/admin/userUdate.php") ;
    break;


    default: require("views/404.php");
}

// footer section

    require_once("views/admin/layouts/footer.php");


ob_end_flush();
?>
