<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- the icon image-->
    <link rel="shortcut icon" href="/wddassignment/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/wddassignment/favicon.ico" type="image/x-icon">

    <!-- Bootstrap and CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login</title>
</head>
<body>
    
<div class="container">
    <div class="row mt-5">
      <div class="col-md-8 mx-auto">
        <div class="card card-body">
          <h1 class="text-center text-secondary mb-4"> <i class="fa fa-mixcloud" aria-hidden="true"></i> Learning Management System</h1>
          <h2 class="h2 text-center text-primary">Login</h2>
          <!-- Login Tabs -->
          <ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="admin-tab-md" data-toggle="tab" href="#admin-md" role="tab" aria-controls="admin-md" aria-selected="true">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="lecturer-tab-md" data-toggle="tab" href="#lecturer-md" role="tab" aria-controls="lecturer-md" aria-selected="false">Lecturer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="student-tab-md" data-toggle="tab" href="#student-md" role="tab" aria-controls="student-md" aria-selected="false">Student</a>
            </li>
          </ul>
          <div class="tab-content card pt-5" id="myTabContentMD">
            <div class="tab-pane fade show active" id="admin-md" role="tabpanel" aria-labelledby="admin-tab-md">
              <!-- Admin Login Form Start -->
              <form action="" method="post" class="d-flex flex-column justify-content-center align-items-center">
                <div class="form-group w-75">
                  <label for="id">Admin ID</label>
                  <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Admin id" required>
                </div>
                <div class="form-group w-75">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <input type="hidden" name="form_type" value="admin">
                <button type="submit" class="btn btn-primary w-25 my-4">Submit</button>
              </form>
              <!-- Admin Login Form End -->
            </div>
            <div class="tab-pane fade" id="lecturer-md" role="tabpanel" aria-labelledby="lecturer-tab-md">
              <!-- Lecturer Login Form Start -->
              <form action="" method="post" class="d-flex flex-column justify-content-center align-items-center">
                <div class="form-group w-75">
                  <label for="id">Lecturer ID</label>
                  <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Lecture id" required>
                </div>
                <div class="form-group w-75">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <input type="hidden" name="form_type" value="lecturer">
                <button type="submit" class="btn btn-primary w-25 my-4">Submit</button>
              </form>
              <!-- Lecturer Login Form End -->
            </div>
            <div class="tab-pane fade" id="student-md" role="tabpanel" aria-labelledby="student-tab-md">
              <!-- Student Login Form Start -->
              <form action="" method="post" class="d-flex flex-column justify-content-center align-items-center">
                <div class="form-group w-75">
                  <label for="id">Student ID</label>
                  <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Student id" required>
                </div>
                <div class="form-group w-75">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <input type="hidden" name="form_type" value="student">
                <small>Are you new and Don't have an account? <a href="/wddassignment/studentsignup.php" class="a">Sign Up</a></small>
                <button type="submit" class="btn btn-primary w-25 my-4">Submit</button>
              </form>
              <!-- Student Login Form End -->
            </div>
          </div>
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
</body>
</html>

<?php
if (isset($_POST['form_type'])) {
    $form_type = $_POST['form_type'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "wddlms";
    $conn = new mysqli($servername, $username, $pass, $dbname);
    $sql = "SELECT * FROM $form_type WHERE id='" . $id . "' and password = '".$password."' "; 
  $result = $conn->query($sql);
    $msg = "";
    if ($result->num_rows > 0) {
        switch ($form_type) {
          case 'student' :
          echo "<script> window.location = 'http://localhost/wddassignment/studentdashboard.php?id=${$id}' </script>";
            break;
          case 'lecturer' :
            echo "<script> window.location = 'http://localhost/wddassignment/lecturerdashboard.php?id=#{$id}' </script>";
            break;
          case 'admin' :
            echo "<script> window.location = 'http://localhost/wddassignment/admindashboard.php' </script>";
            break;
        }
    } else {
        $msg =  "Invalid ID";
    }  
    if($msg != ''){
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
  $conn->close();
}
?>