<?php

require "db_connection.php";

$sql = "SELECT username
		FROM lab9_user
		WHERE username = :username";
		
$stmt = $dbConn->prepare($sql);
$stmt->execute(array(":username"=>$_GET["username"]));
$record = $stmt->fetch();

$output = array();
if (!empty ($record)) {
	$output['exists'] = "true";
	//echo "{\"exists\":\"true\"}";
} else {
	$output['exists'] = "false";
}

echo json_encode($output);
		
?>
