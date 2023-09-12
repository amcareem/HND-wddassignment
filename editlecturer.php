<?php

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

$conn = new mysqli($servername, $username, $pass, $dbname);

$statement = $conn->prepare('UPDATE lecturer SET name=?, email=?, address=? WHERE id = ? ; ');
$statement->bind_param('ssss',  $name, $email, $address, $id);

if ($statement->execute() == true)
  echo 'ok';
else
  echo 'fail';

$conn->close();