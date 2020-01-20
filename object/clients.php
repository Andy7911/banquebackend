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


function create(){
$query="insert into clients set nom=:nom,lastname=:lastname,age=:age,solde=:solde,credit=:credit";
$stmt = $this->conn-> prepare($query);

$this->nom=htmlspecialchars(strip_tags($this->nom));
$this->lastname=htmlspecialchars(strip_tags($this->lastname));
$this->age= htmlspecialchars(strip_tags($this->age));
$this->solde=  htmlspecialchars(strip_tags($this->solde));
$this->credit= htmlspecialchars(strip_tags($this->credit));
// bind value 
$stmt->bindParam(":nom",$this->nom);
$stmt->bindParam(":lastname",$this->lastname);
$stmt->bindParam(":age",$this->age);
$stmt->bindParam(":solde",$this->solde);
$stmt->bindParam(":credit",$this->credit);



if($stmt-> execute()){
    return true;
}

    return false;

}
function read(){
    $query ="SELECT * FROM clients";
    $stmt=$this->conn->prepare($query);
    $this->nom=htmlspecialchars(strip_tags($this->nom));

    $stmt->execute();
     return $stmt;
}
function delete(){
$query = "DELETE FROM clients Where id = ?";
$stmt=$this->conn->prepare($query);
$this->id=htmlspecialchars(strip_tags($this->id));

$stmt->bindParam(1,$this->id, PDO::PARAM_INT);

if($stmt->execute()){

    return true;
}
return false;
}


} 
?>