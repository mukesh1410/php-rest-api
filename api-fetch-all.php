<?php
	header('Content-Type: application/json'); //to return json formate
	header('Access-Control-Allow-Origin: *'); //From where is the website accessible? 

	include "config.php"; //include config file

	$sql = "SELECT * FROM students"; // to fetch the data from the students table 
	$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

	if(mysqli_num_rows($result) > 0 ){
		$output = mysqli_fetch_all($result, MYSQLI_ASSOC); // to convert associative array from the index array
		echo json_encode($output); //associative array is convert into a json formate and return json formate
	}else{ 
		echo json_encode(array('message' => 'No Record Found.', 'status' => false)); // if the database is empty then return else part
	}
?>