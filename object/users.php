<?php 



class User {
private $conn;
public $id;
public $username;
public $password;
public $token;

public function __construct($db){

    $this->conn=$db;
}

function findUser(){
$query = "select * from user where Username = ?";
$stml=$this->conn->prepare($query);
$stml->bindParam(1,$this->username);
$stml->execute();
$row= $stml->fetch(PDO::FETCH_ASSOC);
$this->password=$row['password'];
$this->id = $row['id'];

return $stml;


}
function findClientByUserId(){
$query = "select nom, username,password, lastname from clients inner JOIN user on user.id = clients.userId where user.id = ?
";
$stml =$this->$conn->prepare($query);
$stml->bindParam(1,$this->id);
$stml->execute();
$row= $stml->fetch(PDO::FETCH_ASSOC);


}



}



?>