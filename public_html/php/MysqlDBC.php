<?php

/**
 * Description of MysqlDBC
 * Clase que provee la conexion directa a la base de datos mysql
 * utilizando las libreria de mysqli que provee php
 * 
 * @author 
 */
class MysqlDBC {

    private $connection; // mysql connection
    private $url;
    private $username;
    private $password;
    private $name;
    
    function __construct($url = 'localhost', $username = 'ynorena', $password = 'LN9203100', $name = 'ynorena_reto1') {
        $this->url = $url;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->connect();
    }

    // mysqli connection
    public function connect() {
        $this->connection = mysqli_connect($this->url, $this->username, $this->password, $this->name) or $this->mysqlError();
        $this->connection->set_charset("utf8");
    }
    
    public function select($sentence) {
        $result = mysqli_query($this->connection, $sentence) or $this->mysqlErrorQuery($sentence);
        return $result;
    }
    
    public function insert($sentence) {
        mysqli_query($this->connection, $sentence) or $this->mysqlErrorQuery($sentence);
        return mysqli_insert_id($this->connection);
    }
    
    public function update($sentence) {
        mysqli_query($this->connection, $sentence) or $this->mysqlErrorQuery($sentence);
        return mysqli_affected_rows($this->connection);
    }
    
    public function delete($sentence) {
        mysqli_query($this->connection, $sentence) or $this->mysqlErrorQuery($sentence);
        return mysqli_affected_rows($this->connection);
    }

    public function mysqlError() {
        return array('errno' => mysqli_connect_errno(), 'error' => mysqli_connect_error());        
    }
    
    public function mysqlErrorQuery($sentence) {
        return array('errno' => mysqli_errno($this->connection), 'error' => mysqli_error($this->connection), 'sentence' => $sentence);        
    }
    
}

?>