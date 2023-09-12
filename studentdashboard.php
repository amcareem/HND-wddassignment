<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

$student_data = '';

$conn = new mysqli($servername, $username, $pass, $dbname);
$exam_data = $conn->query("SELECT * FROM exam ;")->fetch_all();
$lecturer_data = $conn->query("SELECT * FROM lecturer ;")->fetch_all();

if (!isset($_SERVER['QUERY_STRING']) || empty($_SERVER['QUERY_STRING'])) {
  echo "<script> alert('Please login to view this page') </script>";
  die();
}

function getStudentByID()
{
  global $student_data;
  global $servername, $username, $pass, $dbname;

  $id = preg_split('/=/', $_SERVER['QUERY_STRING'], -1, PREG_SPLIT_NO_EMPTY)[1];

  $conn = new mysqli($servername, $username, $pass, $dbname);
  $sql = "SELECT * FROM student WHERE id='" . $id . "';";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $student_data = $row;
  }

  $conn->close();
  return $student_data['name'];
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Student Dashboard</title>
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
  <header>
    <div class="container-fluid shadow-lg">
      <div class="row">
        <div class="col-sm-12 d-flex justify-content-between align-items-center px-5 py-2  bg-primary text-light">
          <h1 class="h1 font-weight-light">Learning Management System</h1>
          <div class="d-flex w-25 justify-content-between align-items-baseline">
            <h2 class="h4 font-weight text-light font-weight-light"> <?php echo getStudentByID(); ?> </h2>
            <a name="logout" id="logout" class="btn btn-warning" onclick="window.location = 'http://localhost/wddassignment'" role="button">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container mt-5 ">
    <div class="row">
      <div class="col-md-12 mx-auto">
        <div class="card card-body">
          <h1 class="text-secondary mb-4"> </i>Student Dashboard </h1>
          <!-- Login Tabs -->
          <ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="admin-tab-md" data-toggle="tab" href="#admin-md" role="tab" aria-controls="admin-md" aria-selected="true">Scheduled Exams</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="lecturer-tab-md" data-toggle="tab" href="#lecturer-md" role="tab" aria-controls="lecturer-md" aria-selected="false">Lecturer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="edit-tab-md" data-toggle="tab" href="#edit-md" role="tab" aria-controls="edit-md" aria-selected="false">Edit Profile</a>
            </li>
          </ul>
          <div class="tab-content card pt-5" id="myTabContentMD">
            <div class="tab-pane fade show active" id="admin-md" role="tabpanel" aria-labelledby="admin-tab-md">
              <h2 class="h2 text-center text-secondary">Scheduled Exams</h2>
              <div class="table-responsive">
                <table class="table table-bordered table-hover my-4" table_type="student">
                  <thead class="thead-dark">
                    <tr>
                      <th>Scheduled By</th>
                      <th>Title</th>
                      <th>Subtitle</th>
                      <th>Time</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($exam_data as $exam) {
                      echo <<<EXAM
                      <tr>
                        <td>$exam[1]</td>
                        <td>$exam[2]</td>
                        <td>$exam[3]</td>
                        <td>$exam[4]</td>
                        <td>$exam[5]</td>
                      </tr>
                      EXAM;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="lecturer-md" role="tabpanel" aria-labelledby="lecturer-tab-md">
              <!-- Lecturer Login Form Start -->
              <h2 class="h2 text-center text-secondary">Scheduled Exams</h2>
              <div class="table-responsive">
                <table class="table table-bordered table-hover my-4" table_type="student">
                  <thead class="thead-dark">
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th colspan="2">Designation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($lecturer_data as $lecturer) {
                      echo <<<EXAM
                      <tr>
                        <td>$lecturer[0]</td>
                        <td>$lecturer[1]</td>
                        <td>$lecturer[2]</td>
                        <td>$lecturer[4]</td>
                        <td class='d-flex justify-content-center'> <a name="register" id="register" class="btn btn-primary" href="#" role="button">Register</a></td>
                      </tr>
                      EXAM;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- Lecturer Login Form End -->
            </div>
            <div class="tab-pane fade" id="edit-md" role="tabpanel" aria-labelledby="edit-tab-md">
              <!-- Edit Details Form Start -->
              <form action="" class="d-flex flex-column justify-content-center align-items-center">
                <div class="form-group w-75 ">
                  <label for="id">Student ID</label>
                  <input type="text" class="form-control" name="id" id="id" placeholder="ID" value="<?php echo $student_data['id']; ?>" disabled>
                </div>
                <div class="form-group w-75 mx-5">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="<?php echo $student_data['name']; ?>" required>
                </div>
                <div class="form-group w-75 mx-5">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $student_data['address']; ?>" required>
                </div>
                <a name="edit" id="edit" class="btn btn-primary w-25 mb-4 mt-2 text-white" onclick="editUser()" role="button">Edit</a>
              </form>
              <!-- Edit Details Form End -->
            </div>
          </div>

          <script>
            function editUser() {
              const id = $('input[name="id"]').val()
              const name = $('input[name="name"]').val()
              const address = $('input[name="address"]').val()
              const formData = new FormData()

              formData.append('id', id)
              formData.append('name', name)
              formData.append('address', address)

              fetch('http://localhost/wddassignment/editstudent.php', {
                  method: 'post',
                  body: formData
                })
                .then(resp => resp.text()
                  .then(txt => {
                    if (txt == 'ok') {
                      alert('Edit successfull')
                      location.reload()
                    } else if (txt == 'fail')
                      alert('Failed to update data')
                  }))
                .catch(err => console.error(err))
            }
          </script>

          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>