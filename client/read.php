<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../config/database.php';
include_once '../object/clients.php';

//instantiate 
$database= new Database();
$db = $database-> getConnection();
// initialize object 
$client = new client($db);
//read product will be here

//query product

$stmt=$client->read();
$num =$stmt->rowCount();
if($num>0){
 $clients_arr=array();
 $clients_arr["client"]= array();
 while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    extract($row);
    $client_des=array(
        "id"=> $id,
        "nom"=>$nom,
        "lastName"=>$lastName,
        "age"=> $age,
        "solde"=>$solde,
        "credit"=> $credit
    );
    array_push($clients_arr["client"], $client_des);
 }
 http_response_code(200);

echo json_encode($clients_arr,JSON_NUMERIC_CHECK);
}

?>