<?php

    session_start();
    
    
    function createSession($user){
        $_SESSION['user'] = $user;
        return true;
    }
    
    function closeSession(){
        session_destroy();
        return true;
    }
    
    function getSession(){
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;
    }


?>
