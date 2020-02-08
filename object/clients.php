<?php

class client {

    private $conn;
    private $table_name="clients";
    public  $id;
    public  $nom;
    public  $lastname;
    public  $age;
    public  $solde;
    public  $credit;

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
function findClientByUserId($index){
    $query = "select nom,lastname,age,solde,credit from clients inner JOIN user on user.id = clients.userId where user.id = ?
    ";
    $stml =$this->conn->prepare($query);
    $stml->bindParam(1,$index);
    $stml->execute();
    $row= $stml->fetch(PDO::FETCH_ASSOC);
    $this->nom=$row['nom'];
    $this->lastname=$row['lastname'];
    $this->solde=$row['solde'];
    $this->credit=$row['credit'];
    $this->age=$row['age'];
    return $stml;
    
    }
function read_one(){

$query ="SELECT * FROM clients where id = ?";
$stmt = $this->conn->prepare($query);
$this->nom=htmlspecialchars(strip_tags($this->nom));
$stmt->bindParam(1,$this->id);

$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$this->nom=$row['nom'];
$this->lastname=$row['lastname'];
$this->solde=$row['solde'];
$this->credit=$row['credit'];
$this->age=$row['age'];
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
function Update(){

$query= "Update 
clients SET 
nom= :nom, lastname= :lastname, 
age= :age,
solde=:solde, 
credit= :credit 
Where id = :id";
 $stmt= $this->conn->prepare($query);
 $this->id=htmlspecialchars(strip_tags($this->id));
 $this->nom=htmlspecialchars(strip_tags($this->nom));
 $this->age=htmlspecialchars(strip_tags($this->age));
 $this->solde=htmlspecialchars(strip_tags($this->solde));
 $this->credit=htmlspecialchars(strip_tags($this->credit));

 $stmt->bindParam(":id",$this->id);
 $stmt->bindParam(":nom",$this->nom);
 $stmt->bindParam(":lastname",$this->lastname);
 $stmt->bindParam(":age",$this->age);
 $stmt->bindParam(":credit",$this->credit);
 $stmt->bindParam(":solde",$this->solde);

if($stmt->execute()){

    return true;
}
return false;

}

} 
?>