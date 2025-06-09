<?php

namespace APP\src;
use PDO;
use PDOException;

use APP\traits\Mail;

class User 
{

    use Mail;
// register
    public static function register($pdo, $name, $email, $phone, $pass) {

        $role = "super";
        // Prepare 
        $stm = $pdo->prepare("
            INSERT INTO `users` (user_name, email, phone, password, rule)
            VALUES (?, ?, ?, ?, ?)
        ");
        // Execute 
        $success = $stm->execute([$name, $email, $phone, $pass, $role]);
        // get user info
        $_SESSION['user']['user_id'] = $pdo->lastInsertId(); 
        $_SESSION['user']['email'] = $email; 
        $_SESSION['user']['user_name'] = $name;
        $_SESSION['user']['phone'] = $phone;

        return $success;
    }
// =========================================
    // login
    public static function login($pdo, $email, $pass)
    {
        $stm = $pdo->prepare("SELECT * FROM users WHERE email =(?)");
        $stm->execute([$email]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function user_info($pdo, $email)
    {
        $stm = $pdo->prepare("SELECT * FROM users WHERE email =(?)");
        $stm->execute([$email]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // get all users
    public static function get_users($pdo)
    {
        // $stm = $pdo->query("SELECT * FROM users");
        $stm = $pdo->query("SELECT * FROM users");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    // modify
    public static function user_modify($pdo,$target, $param, $id)
    {
        // Prepare 
        $stm = $pdo->prepare("
            UPDATE users SET $target = ? WHERE user_id = ?");
        // Execute 
        $success = $stm->execute([$param, $id]); 
        // get user info
        if($success)
        {
            $_SESSION['user'][$target] = $param ; 
            return true;
        }
    }

    // modify by email

        public static function user_modify_by_email($pdo,$target, $param, $email)
        {
            // Prepare 
            $stm = $pdo->prepare("
                UPDATE users SET $target = ? WHERE email = ?");
            // Execute 
            $success = $stm->execute([$param, $email]); 
            // get user info
            if($success)
            {

                return true;
            }
        }

    public static function delete($pdo, $id)
    {
        $stm = $pdo->prepare("DELETE FROM `users` WHERE user_id = ?");
        $result = $stm->execute([$id]);
        return $result;
    }

}