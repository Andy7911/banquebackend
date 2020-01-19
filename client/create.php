<?php
// required headers
header('Access-Control-Allow-Origin: http://localhost:3000');
header("Access-Control-Allow-Credentials, true");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods, DELETE, POST, GET, OPTIONS");
header("Access-Control-Max-Age: 86400");
header("Access-Control-Expose-Headers: Access-Control-Allow-Origin");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../object/clients.php';
 
$database = new Database();
$db = $database->getConnection();
 
$client = new client($db);
 $clasa = $_POST;
// get posted data
$data=(object)($clasa);
if($_SERVER['REQUEST_METHOD']==='POST' && empty($_POST)){
$data = json_decode(file_get_contents("php://input"));
}
// make sure data is not empty
if(
    !empty($data->nom) &&
    !empty($data->lastname) &&
    !empty($data->age) &&
    !empty($data->solde)&&
    !empty($data->credit)
){
 
    // set product property values
    $client->nom = $data->nom;
    $client->lastname = $data->lastname;
    $client->age = $data->age;
    $client->solde= $data->solde;
    $client->credit = $data->credit;
 
    // create the product
    if($client->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "client was added."));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to add client."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>