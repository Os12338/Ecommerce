<?php

use APP\src\User;

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $user_id = $_POST['user-id'];

    $result = User::delete($pdo, $user_id);
    if($result)
    {
        setMessage("Deleted successfully");
        if($_SESSION['user']['user_id'] === $user_id)
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

