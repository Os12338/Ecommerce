<?php

// set message 
function setMessage($message, $type = 'success') {
    if(is_array($message)){
        foreach($message as $message => $item){
            
            $_SESSION['message'] .= $item ."<br>";
        }
    $_SESSION['message_type'] = $type;
    }else{
        $_SESSION['message'] = $message;
        $_SESSION['message_type'] = $type;
    }
}

function getMessage() {
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-{$_SESSION['message_type']}'>{$_SESSION['message']}</div>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
}


function randum()
{
    return rand(10000,100000);
}



?>