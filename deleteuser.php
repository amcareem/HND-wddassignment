/**
* This program was created by Ahamed Careem (Github: amcareem, LinkedIn: https://www.linkedin.com/in/ahamedmusthafacareem/)
*
* All rights reserved. Copying or publishing this code anywhere else without permission is strictly prohibited.
*/
<?php

$id = $_POST['id'];
$form_type = $_POST['form_type'];

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

$conn = new mysqli($servername, $username, $pass, $dbname);

$statement = $conn->prepare("DELETE FROM $form_type WHERE id = ? ;");
$statement->bind_param('s', $id);

if ($statement->execute() == true)
  echo 'ok';
else
  echo 'fail';

$conn->close();