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






?>