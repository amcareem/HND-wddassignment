/**
* This program was created by Ahamed Careem (Github: amcareem, LinkedIn: https://www.linkedin.com/in/ahamedmusthafacareem/)
*
* All rights reserved. Copying or publishing this code anywhere else without permission is strictly prohibited.
*/
<?php

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$courses = $_POST['courses'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

$conn = new mysqli($servername, $username, $pass, $dbname);

$statement = $conn->prepare('INSERT INTO student VALUES(?, ?, ?, ?, ?, ?) ;');
$statement->bind_param('ssssss', $name, $email, $address, $courses, $id, $password);

if ($statement->execute() == true)
  echo 'ok';
else
  echo 'fail';

$conn->close();