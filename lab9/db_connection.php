<?php

$host     = "127.0.0.1";
$dbname   = "lara4594";
$username = "root"; 
$password = "secret";

//establishes database connection
	$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

/*try {
	$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
catch (Exception $e) {
	throw new Exception("Error connecting to database");
}*/	

//shows errors when connecting to database
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


?>