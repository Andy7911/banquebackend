<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/database.php';
include_once '../object/inventaire.php';

//instantiate 
$database= new Database();
$db = $database-> getConnection();
// initialize object 
$inventaire = new inventaire($db);
//read product will be here

//query product

$stmt=$inventaire->read();
$num =$stmt->rowCount();
if($num>0){
 $inventaire_arr=array();
 $inventaire_arr["inventaire"]= array();
 while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    extract($row);
    $inventaire_des=array(
        "id"=> $id,
        "item"=>$item,
        "description"=>$description,
        "price"=> $price,
        "stock"=>$stock,
        "created"=> $created,
        "modified"=>$modified
    );
    array_push($inventaire_arr["inventaire"], $inventaire_des);
 }
 http_response_code(200);

echo json_encode($inventaire_arr,JSON_NUMERIC_CHECK);
}

?>