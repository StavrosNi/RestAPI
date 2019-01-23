<?php

class Database{
//DB parameters
    
    private $hostname = 'http://192.168.64.2';
    private $dbname =' quotes-api';
    private $username = "root";
    private $password = "";
    private $pdo;

public function __construct()
{

$this->pdo= null;
try{

$this ->pdo= new PDO("mysql:host= $this->hostname;dbname=$this->dbname;",
$this->username, $this->password);
$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){

    echo "Error: ".$e->getMessage(); //calls getMessage() of PHP on variable $e
}

}

public function fetchAll($query) {
$stmt = $this->pdo->prepare($query);
$stmt ->execute();
$rowCount =$stmt ->rowCount(); //count the rows

if($rowCount <=0){
    return 0;
}
else {
return $stmt ->fetchAll();

}
}
public function fetchOne($query, $parameter){
    $stmt = $this->pdo->prepare($query);
    $stmt -> execute();
    $rowCount = $stmt ->rowCount(); //count the rows
    if($rowCount <=0){
        return 0;
    }
    else {
    return $stmt ->fetch(); //returns one row.
    
    }

}

public function executeCall ($username, $call_allowed, $timeOutSeconds){
    $query = "SELECT plan, calls_made, time_start, time_end
            FROM users # from users table
            WHERE username = '$username'
            ";
    $stmt = $this ->pdo->prepare($query);
    $stmt =$this ->execute(['$username']);

    $timeOut = date(time())- $results ['time_start'] >= $timeOutSeconds || 
    $results ['time_start'] === 0 ;

   // $query = "UPDATE users
    //SET calls_made =" ;
    //$query .=$timeOut ? "1, time start = ".date(time()) ", time_end = ". strtotime("+
///$timeOutSeconds seconds") : "calls_made +1 ";
//$query.-
}



}


?>