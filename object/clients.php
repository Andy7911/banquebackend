<?php

class client {

    private $conn;
    private $table_name="clients";
    public $id;
    public $nom;
    public $lastname;
    public $age;
    public $solde;
    public $credit;

public function __construct($db){
    $this->conn= $db;
}
function read(){
    $query ="SELECT * FROM clients";
    $stmt=$this->conn->prepare($query);
    $stmt->execute();
     return $stmt;
}


} 
?>