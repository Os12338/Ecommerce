<?php

use APP\src\User;

User::user_modify($pdo,"status", 0 , $_SESSION['user']['user_id']);

unset($_SESSION['user']);

session_destroy();

header("location:?page=home");