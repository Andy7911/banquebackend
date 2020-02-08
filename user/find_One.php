<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../object/users.php';
include_once '../object/Clients.php';
$database = new Database();
$db= $database->getConnection();
$user = new User($db);
$client = new client($db);
$user->username= $_GET['username'];
$password = $_GET['password'];
$user->findUser();

if($user->username!= null&&$user->password!=null){

//verifie si le mots de passe est identique
if($password==$user->password){
//cherche le client avec le Id du user
$client->findClientByUserId($user->id);

$client_array = array(
   
    "nom" => $client->nom,
    "lastname" => $client->lastname,
    "solde" => $client->solde,
    "credit" => $client->credit,
    "age" => $client->age


);
http_response_code(200);

echo json_encode($client_array,JSON_NUMERIC_CHECK);


} 

else{
http_response_code(400);
echo json_encode(array("message" => "Mots de passe invalide"));



}


} 
else{
    http_response_code(400);
    echo json_encode(array("message" => "Veuillez entrez votre mots de passe ou Username"));


}




?>