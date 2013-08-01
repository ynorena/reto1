<?php


    include_once 'MysqlDBC.php';
    
    $sql = "SELECT * FROM `image`";
    
    $mysqlDBC = new MysqlDBC();
    $result = $mysqlDBC->select($sql);
    $arrayResults = array();
    while($row = $result->fetch_assoc()){
        array_push($arrayResults, $row);
    }
        
    echo json_encode($arrayResults);


?>
