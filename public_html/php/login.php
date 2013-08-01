<?php

    include_once 'Session.php';
    include_once 'MysqlDBC.php';
    
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];

    $sql = "SELECT * FROM `user` WHERE `user` = '".$user."' AND `password` = '".$pass."' ";
    
    
    $mysqlDBC = new MysqlDBC();
    $result = $mysqlDBC->select($sql);
    if($result->fetch_assoc()){
        createSession($user);
        echo json_encode(array('result' => true));
    }else{
        echo json_encode(array('result' => false));
    }
        

?>
