<?php

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$designation = $_POST['designation'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

$conn = new mysqli($servername, $username, $pass, $dbname);

$statement = $conn->prepare('INSERT INTO lecturer VALUES(?, ?, ?, ?, ?, ?) ;');
$statement->bind_param('ssssss', $id, $name, $email, $address, $designation, $password);

if ($statement->execute() == true)
  echo 'ok';
else
  echo 'fail';

$conn->close();