<?php

class Database{
//DB parameters

    private $hostName = "mysql:host=http://192.168.64.2";
    private $dbname = "quotes_api";
    private $username = "root";
    private $password = "";
    private $pdo;
}

 function __contruct()
{

$this->pdo= null;
try{

$this ->pdo= new PDO("mysql:host= $this->hostName;dbname=$this->dbname;",
$this->username, $this->password);
$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION;

} PDOException $e{

    echo "Error: ".$e->getMessage(); //calls getMessage() of PHP on variable $e
}

}

public function fetchAll($query) {



}

?>