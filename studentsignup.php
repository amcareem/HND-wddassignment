/**
* This program was created by Ahamed Careem (Github: amcareem, LinkedIn: https://www.linkedin.com/in/ahamedmusthafacareem/)
*
* All rights reserved. Copying or publishing this code anywhere else without permission is strictly prohibited.
*/
<!doctype html>
<html lang="en">

<head>
  <title>Student Registration</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="/wddassignment/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/wddassignment/favicon.ico" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <div class="container">
    <div class="row mt-5">
      <div class="col-md-8 mx-auto">
        <div class="card card-body">
          <h1 class="text-center text-secondary mb-4"> <i class="fa fa-mixcloud" aria-hidden="true"></i> Learning Management System</h1>
          <h2 class="h2 text-center text-primary mt-3">Sign Up</h2>

          <form action="" method="post" class="d-flex flex-column justify-content-center align-items-center mt-5">
            <div class="form-group w-75">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group w-75">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group w-75">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address" required>
            </div>
            <div class="form-group w-75">
              <label for="courses">Registered Courses</label>
              <input type="text" class="form-control" name="courses" id="courses" aria-describedby="helpId" placeholder="CRP, WDD, DSA etc">
            </div>
            <div class="form-group w-75">
              <label for="id">Student ID</label>
              <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Enter your id" minlength="6" required>
            </div>
            <div class="form-group w-75">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" minlength="6" required>
            </div>
            <small>Already have an account? <a href="index.php/" class="a">Sign In</a></small>
            <button type="submit" class="btn btn-primary w-25 my-4">Submit</button>
          </form>

          <!-- Login Tabs End -->
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

function student_exists($student_id)
{
  global $servername, $username, $pass, $dbname;
  $conn = new mysqli($servername, $username, $pass, $dbname);

  $stmt = $conn->prepare("SELECT * FROM student WHERE id= ? ;");
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0)
    return true;

  return false;
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['id']) && isset($_POST['password'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $courses = $_POST['courses'];
  $id = $_POST['id'];
  $password = $_POST['password'];
  $msg = "";

  $conn = new mysqli($servername, $username, $pass, $dbname);
  // Check connection
  if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

  if (!student_exists(($id))) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $statement = $conn->prepare("INSERT INTO student VALUES (?, ?, ?, ?, ?, ?)");
    $statement->bind_param('ssssss', $name, $email, $address, $courses, $id, $hashed_password);
    // $sql = "INSERT INTO student VALUES ('$name', '$email', '$address', '$id', '$hashed_password');";

    // if ($conn->query($sql) === TRUE) 
    if ($statement->execute() == true)
      $msg = "Student registration successfull! You may now log in.";
  } else
    $msg = "Student registration failed! Student ID already registered.";

  $conn->close();
  echo <<<MSG
      <!-- Button trigger modal -->
      <button type="button" id="responseBtn" class="btn btn-primary d-none" data-toggle="modal" data-target="#responseModal">
        Launch demo modal
      </button>
      <!-- Modal -->
      <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
              $msg
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <script>
        document.querySelector('#responseBtn').click()
      </script>
      MSG;
}
?>