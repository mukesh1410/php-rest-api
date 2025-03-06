<?php
header('Content-Type: application/json');//to return json formate
header('Access-Control-Allow-Origin: *');//From where is the website accessible?

$data = json_decode(file_get_contents("php://input"), true);//php://input means Where is the request coming from? then we can use this method. file_get_content is a method to read raw data. json.decode is a method to convert array from json and true means return only associative array.
$search_value = $data['search'];

// $search_value = isset($_GET['search']) ? $_GET['search'] : die();

include "config.php";

$sql = "SELECT * FROM students WHERE first_name LIKE '%{$search_value}%' ";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){
	$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($output);
}else{
    echo json_encode(array('message' => 'No Search Found.', 'status' => false));
}  
?>