<?php 
include("config.php");
include("classes/Work.class.php");

//JSON
header("Content-Type: application/json; charset=UTF-8");

//Allow access 
header("Access-Control-Allow-Origin: https://mallind.se");

//Allow methods
header("Access-Control-Allow-Methods: POST, GET, DELETE, PUT");
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);


if ($request[0] != "work") {
	http_response_code(404);
	exit();
}

$work = new Work();
if(isset($request[1])) {
	$id = $request[1];
}

switch ($method){
    case "GET":
        //Kod för Get
        if(isset($id)) {
            $response = $work->viewWorkId($id);
        }else{
            $response = $work->viewWork();

        }

        if(sizeof($response) > 0 ) { 
            http_response_code(200); // Work found
            } else 
            { http_response_code(404); // Work not found
                $response = array("message" => "Inga jobb hittades"); // Error message 
            } 
        break;
    case "PUT":
        //Kod för put
        $response = $work->updateWork($input['id'], $input['dates'], $input['company'], $input['title']);

        break;
    case "POST":
        //Kod för post
        $response = $work->createWork($input['dates'], $input['company'], $input['title']);
        
        break;
    case "DELETE":
        //Kod för delete
        $response = $work->deleteWork($input['id']);
        break;
    default:
        break;
}
echo json_encode($response);

?>