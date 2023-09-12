<?php

$query_string = preg_split('/=/', $_SERVER['QUERY_STRING'], -1, PREG_SPLIT_NO_EMPTY);
$id_type = $query_string[0];
$id = $query_string[1];

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";
$table = "";

$conn = new mysqli($servername, $username, $pass, $dbname);

$statement = $conn->prepare("SELECT * FROM $id_type WHERE id= ? ;");
$statement->bind_param('s', $id);
$statement->execute();

echo json_encode($statement->get_result()->fetch_assoc());

$conn->close();