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
if (isset($_POST['courses']))
  $courses = $_POST['courses'];
if (isset($_POST['designation']))
  $designation =   $_POST['designation'];
$password = $_POST['password'];
$doHash = $_POST['hash'];

$form_type = $_POST['form_type'];

if ($doHash === true)
  $password = password_hash($password, PASSWORD_DEFAULT);

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

$conn = new mysqli($servername, $username, $pass, $dbname);

$statement = '';
if ($form_type == 'student') {
  $statement = $conn->prepare('UPDATE student SET name=? , address=?, email=?, courses=?, password=? WHERE student.id=? ;');
  $statement->bind_param('ssssss', $name, $address, $email, $courses, $password, $id);
} else if ($form_type == 'lecturer') {
  $statement = $conn->prepare('UPDATE lecturer SET name=? , address=?, email=?, designation=?, password=? WHERE lecturer.id=? ;');
  $statement->bind_param('ssssss', $name, $address, $email, $designation, $password, $id);
}

if ($statement->execute() == true)
  echo 'ok';
else
  echo 'fail';

$conn->close();
