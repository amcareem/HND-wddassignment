<?php

$name = $_POST['name'];
$address = $_POST['address'];
$id = $_POST['id'];

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

$conn = new mysqli($servername, $username, $pass, $dbname);

$statement = $conn->prepare('UPDATE student SET name=? , address=? WHERE student.id=? ;');
$statement->bind_param('sss', $name, $address, $id);

if ($statement->execute() == true)
  echo 'ok';
else
  echo 'fail';

$conn->close();