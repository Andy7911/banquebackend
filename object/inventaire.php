<?php 

class inventaire {
private $conn;
private $table_name="inventaire";
public $item;
public $price;
public $description;
public $stock;
public $created;
public $modified;

public function __construct($db){

    $this->conn=$db;

}
function read(){

$query =" select * from inventaire";
$stmt=$this->conn->prepare($query);
$stmt->execute();
 return $stmt;


}


}

?>