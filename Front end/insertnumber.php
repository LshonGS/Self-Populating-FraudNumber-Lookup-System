<?php 
//connecting to the db
include "connect.php";

$number = $_POST['Number'];
$comment = $_POST['Comment'];
$rating = $_POST['Rating'];
$origin = $_POST['Origin'];

//Making sure variables are set properly
if (strlen($_POST['Number']) == 11 and isset($rating) ){
	
	$sql = "INSERT INTO number_record (Phone_Number, Threat_Level, Number_Comment, Record_Origin) VALUES ('$number', '$rating', '$comment' , '$origin') ";

	mysqli_query($connection, $sql);
	header('location:index.php'); 
	exit;

}

else{

}




?>