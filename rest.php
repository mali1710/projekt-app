<?php 
include("config.php");
include("classes/Courses.class.php");

//JSON
header("Content-Type: application/json; charset=UTF-8");

//Allow access 
header("Access-Control-Allow-Origin: *");

//Allow methods
header("Access-Control-Allow-Methods: POST, GET, DELETE, PUT");
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);

if ($request[0] != "kurser") {
	http_response_code(404);
	exit();
}

$course = new Courses();


switch ($method){
    case "GET":
        //Kod för Get
        $response = $course->viewCourse();
        if(sizeof($response) > 0 ) { 
            http_response_code(200); // Course found
            } else 
            { http_response_code(404); // Course not found
                $response = array("message" => "Inga kurser hittades"); // Error message 
            } 
        break;
    case "PUT":
        //Kod för put
        $response = $course->updateCourse($input['code'], $input['name'], $input['progression'], $input['syllabus'], $input['id']);

        break;
    case "POST":
        //Kod för post
        $response = $course->createCourse($input['code'], $input['name'], $input['progression'], $input['syllabus']);
        
        break;
    case "DELETE":
        //Kod för delete
        $response = $course->deleteCourse($input['id']);
        break;
    default:
        break;
}
echo json_encode($response);

?>