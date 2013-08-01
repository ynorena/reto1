<?php

    //error_reporting(0);
    include_once 'MysqlDBC.php';

    $uploaddir = '../imagesUploaded/';
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        $nameImage  = $_FILES['file']['name'];
        $sql = "INSERT INTO `image` (`id`, `name`) VALUES (NULL, '".$nameImage."') ";
        $mysqlDBC = new MysqlDBC();
        $result = $mysqlDBC->insert($sql);
        if($result != null){
            echo 'La Imagen subio Correctamente <br>';
            //echo json_encode(array('result' => true));
        }else{
            echo 'Ocurrio un error subiendo la iamgen <br>';
            //echo json_encode(array('result' => false));
        }
    } else {
        echo 'Ocurrio un error subiendo la iamgen <br>';
        //echo json_encode(array('result' => false));
    }

    echo '<a href="../">Regresar</a>';
    //print_r($_FILES);

?>