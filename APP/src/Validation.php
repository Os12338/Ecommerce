<?php

namespace APP\src;

class Validation
{

    public static $ERRORS = [];

    public static function STRING($string)
    {
        if(!empty($string) && strlen($string) > 2)
        {
            return trim($string);
        }else{
            self::$ERRORS['name'] = "invalid name";
            return null;
        }
    }

    public static function EMAIL($email)
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            return trim($email);
        }else{
            self::$ERRORS['email'] = "invalid email";
            return null;
        }
    }

    public static function PASS($pass)
    {
        $regEx = "/^[A-Za-z0-9]/" ;
        if(strlen($pass) >= 5 && preg_match($regEx,$pass))
        {
            return trim($pass);
        }else{
            self::$ERRORS['pass'] = "password should contain upper/lowercase ,digits and length >= 5";
            return null;
        }
    }

}

?>