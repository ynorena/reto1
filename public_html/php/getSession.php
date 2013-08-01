<?php

    
    include_once 'Session.php';
    include_once 'MysqlDBC.php';
    
    
    $session = getSession();
    echo json_encode(array('session' => $session));

?>
