<?php
header('Content-Type: application/json');//to return json formate
header('Access-Control-Allow-Origin: *');//From where is the website accessible?
header('Access-Control-Allow-Methods: DELETE');//which type of method to insert data in the database via api
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');//only which type of headers pass on the api page for the security purpose

$data = json_decode(file_get_contents("php://input"), true);//php://input means Where is the request coming from? then we can use this method. file_get_content is a method to read raw data. json.decode is a method to convert array from json and true means return only associative array.

$student_id = $data['sid'];

include "config.php";

$sql = "DELETE FROM students WHERE id = {$student_id}";
 
if(mysqli_query($conn, $sql)){
	echo json_encode(array('message' => 'Student Record Deleted.', 'status' => true));
}else{
    echo json_encode(array('message' => 'Student Record not Deleted.', 'status' => false));
} 
?>
