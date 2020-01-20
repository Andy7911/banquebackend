<?php 
header('Access-Control-Allow-Origin: http://localhost:3000');
header("Access-Control-Allow-Credentials, true");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods, DELETE, POST, GET, OPTIONS");
header("Access-Control-Max-Age: 86400");
header("Access-Control-Expose-Headers: Access-Control-Allow-Origin");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';
 
// instantiate client object
include_once '../object/clients.php';


$database = new Database();
$db= $database->getConnection();
$client = new client($db);

$clasa = $_GET;
// get posted data
$data=(object)($clasa);
if($_SERVER['REQUEST_METHOD']==='POST' && empty($_POST)){
$data = json_decode(file_get_contents("php://input"));
}
$client->id=$data->id;
if($client->delete()){

http_response_code(200);

echo json_encode(array("message" => "client was deleted."));


}
else{

    http_response_code(503);
    echo json_encode(array("message" => "Unable deleted."));
}






?>