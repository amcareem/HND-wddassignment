/**
* This program was created by Ahamed Careem (Github: amcareem, LinkedIn: https://www.linkedin.com/in/ahamedmusthafacareem/)
*
* All rights reserved. Copying or publishing this code anywhere else without permission is strictly prohibited.
*/
<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

$conn = new mysqli($servername, $username, $pass, $dbname);

$lecturer = $_POST['lecturer'];
$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$time = $_POST['time'];
$date = $_POST['date'];

if (isset($lecturer) && isset($title) && isset($subtitle) && isset($time) && isset($date)) {
  $stmt = $conn->prepare("INSERT INTO exam (scheduled_by , title , subtitle , time , date) VALUES (?, ?, ?, ?, ?) ;");
  $stmt->bind_param('sssss', $lecturer, $title, $subtitle, $time, $date);

  if ($stmt->execute()) {
    echo "ok";
  } else
    echo "fail";
}