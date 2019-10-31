<?php 
include("config.php");
include("classes/Education.class.php");

//JSON
header("Content-Type: application/json; charset=UTF-8");

//Allow access 
header("Access-Control-Allow-Origin: mallind.se");

//Allow methods
header("Access-Control-Allow-Methods: POST, GET, DELETE, PUT");
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);
if ($request[0] != "education") {
	http_response_code(404);
	exit();
}


$education = new Education();

if(isset($request[1])) {
	$id = $request[1];
}

switch ($method){
    case "GET":
        //Kod för Get
        if(isset($id)) {
            $response = $education->viewEducationId($id);
        }else{
            $response = $education->viewEducation();

        }
        
        if(sizeof($response) > 0 ) { 
            http_response_code(200); // Work found
            } else 
            { http_response_code(404); // Work not found
                $response = array("message" => "Ingen utbildning hittades"); // Error message 
            } 
        break;
    case "PUT":
        //Kod för put
        $response = $education->updateEducation($input['id'], $input['dates'], $input['school'], $input['program']);

        break;
    case "POST":
        //Kod för post
        $response = $education->createEducation($input['dates'], $input['school'], $input['program']);
        
        break;
    case "DELETE":
        //Kod för delete
        $response = $education->deleteEducation($input['id']);
        break;
    default:
        break;
}
echo json_encode($response);

?>