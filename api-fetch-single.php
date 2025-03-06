<?php
header('Content-Type: application/json');//to return json formate
header('Access-Control-Allow-Origin: *');//From where is the website accessible?

$data = json_decode(file_get_contents("php://input"), true); //php://input means Where is the request coming from? then we can use this method. file_get_content is a method to read raw data. json.decode is a method to convert array from json and true means return only associative array.

$student_id = $data['sid']; // get the id which name is sid from the data array to store a variable

include "config.php";//include config file

$sql = "SELECT * FROM students WHERE id = {$student_id}";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);// to convert associative array from the index array
	echo json_encode($output);//associative array is convert into a json formate and return json formate
}else{
    echo json_encode(array('message' => 'No Record Found.', 'status' => false));// if the database is empty then return else part
}    
?>