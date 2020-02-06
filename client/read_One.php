<?php 
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../object/clients.php';


$database = new Database();
$db = $database->getConnection();
$client = new client($db);

$client->id = isset($_GET['id']);
$client->read_one();

if($client->nom!=null){

    $client_arr = array(
        "id" =>  $client->id,
        "nom" => $client->nom,
        "lastname" => $client->lastname,
        "solde" => $client->solde,
        "credit" => $client->credit,
        "age" => $client->age
 
    );


    http_response_code(200);
    echo json_encode($client_arr,JSON_NUMERIC_CHECK);
}
else{

 // set response code - 404 Not found
 http_response_code(404);
 
 // tell the user product does not exist
 echo json_encode(array("message" => " client does not exist."));


}
 







?>