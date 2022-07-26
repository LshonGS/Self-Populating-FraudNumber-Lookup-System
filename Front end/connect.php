<?php 
//Set up the database access credentials
$host = 'localhost'; 
$uid = 'root'; //your standard uni id
$pw = '';  // the password found on the W: drive
$db = 'final_year_project'; //the name of the db you are using on phpMyAdmin
$connection = mysqli_connect($host, $uid, $pw, $db) or exit("Unable to connect to database!");
?>