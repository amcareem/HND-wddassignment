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

$id = preg_split('/=/', $_SERVER['QUERY_STRING'], -1, PREG_SPLIT_NO_EMPTY)[1];

$lecturer_data_result = $conn->query("SELECT * FROM lecturer WHERE id='$id' ;");

$lecturer_data = $lecturer_data_result->fetch_assoc();
$exam_data = $conn->query("SELECT * FROM exam ;")->fetch_all();

$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
  <title>Lecturer Dashboard</title>
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
      <div class="row bg-primary">
        <div class="col-sm-12 d-flex justify-content-between align-items-center px-5 py-2 text-light">
          <h1 class="h1 font-weight-light">Learning Management System</h1>
          <div class="d-flex w-25 justify-content-between align-items-baseline">
            <h2 class="h4 font-weight text-light font-weight-light"> <?php echo "$lecturer_data[name]"; ?> </h2>
            <a name="logout" id="logout" class="btn btn-warning " onclick="window.location = 'http://localhost/wddassignment'" role="button">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container mt-5 ">
    <div class="row">
      <div class="col-md-12 mx-auto">
        <div class="card card-body">
          <h1 class="text-secondary mb-4"> </i>Lecturer Dashboard </h1>
          <!-- Login Tabs -->
          <ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="admin-tab-md" data-toggle="tab" href="#admin-md" role="tab" aria-controls="admin-md" aria-selected="true">Scheduled Exams</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="lecturer-tab-md" data-toggle="tab" href="#lecturer-md" role="tab" aria-controls="lecturer-md" aria-selected="false">Add Exam</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="lecturer-edit-tab-md" data-toggle="tab" href="#lecturer-edit-md" role="tab" aria-controls="lecturer-edit-md" aria-selected="false">Edit</a>
            </li>
          </ul>
          <div class="tab-content card pt-5" id="myTabContentMD">
            <div class="tab-pane fade show active" id="admin-md" role="tabpanel" aria-labelledby="admin-tab-md">
              <!-- Registered Lectures -->
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
              <!-- Registered Lectures End -->
            </div>
            <div class="tab-pane fade" id="lecturer-md" role="tabpanel" aria-labelledby="lecturer-tab-md">
              <h2 class="h2 text-center text-secondary">Schedule an Exam</h2>

              <div class="container my-3">
                <form action="" class="d-flex flex-column justify-content-center align-items-center">
                  <div class="form-group w-50">
                    <label for="exam_title">Title</label>
                    <input type="text" class="form-control" name="exam_title" id="exam_title" placeholder="CSC-101" required>
                  </div>
                  <div class="form-group w-50">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Intro to Computer Science" required>
                  </div>
                  <div class="form-group w-50">
                    <label for="time">Time</label>
                    <input type="text" class="form-control" name="time" id="time" placeholder="1200:1400 hours" required>
                  </div>
                  <div class="form-group w-50 my-2">
                    <input class="" type="date" name="date" id="date" required>
                  </div>
                  <a name="add" id="add" class="btn btn-primary w-25 my-4" href="#" onclick="scheduleExam()" role="button">Add</a>
                </form>
              </div>
            </div>
            <div class="tab-pane fade" id="lecturer-edit-md" role="tabpanel" aria-labelledby="lecturer-edit-tab-md">
              <h2 class="h2 text-center text-secondary">Edit Profile</h2>

              <form action="" class="d-flex flex-column justify-content-center align-items-center">
                <div class="form-group w-50">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="John Doe" value="<?php echo $lecturer_data['name'] ?>">
                </div>
                <div class="form-group w-50">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="johndoe@gmail.com" value="<?php echo $lecturer_data['email'] ?>">
                </div>
                <div class="form-group w-50">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="New York, USA" value="<?php echo $lecturer_data['address'] ?>">
                </div>
                <a name="edit" id="edit" class="btn btn-primary w-25 my-4" role="button" onclick="editLecturer()">Edit</a>
              </form>
            </div>
          </div>
            /**
            * This program was created by Ahamed Careem (Github: amcareem, LinkedIn: https://www.linkedin.com/in/ahamedmusthafacareem/)
            *
            * All rights reserved. Copying or publishing this code anywhere else without permission is strictly prohibited.
            */
          <script>
            function editLecturer() {
              const name = $('#name').val()
              const email = $('#email').val()
              const address = $('#address').val()

              if (name && email && address) {
                const formData = new FormData()

                formData.append('id', '<?php echo $lecturer_data['id'] ?>')
                formData.append('name', name)
                formData.append('email', email)
                formData.append('address', address)

                fetch('http://localhost/wddassignment/editlecturer.php', {
                    method: 'post',
                    body: formData
                  })
                  .then(resp => resp.text()
                    .then(txt => {
                      console.log(txt)
                      if (txt == 'ok') {
                        alert('Edit successfull')
                        location.reload()
                      } else if (txt == 'fail')
                        alert('Failed to update data')
                    }))
                  .catch(err => console.error(err))
              } else
                alert('Please enter all the required fields!')
            }

            function scheduleExam() {
              const title = $('#exam_title').val()
              const subtitle = $('#subtitle').val()
              const time = $('#time').val()
              const date = $('#date').val()

              if (!title || !subtitle || !time || !date) {
                alert('Please enter all the required fields!');
                return
              }

              const formData = new FormData();
              formData.append('lecturer', '<?php echo "$lecturer_data[name]"; ?>')
              formData.append('title', title)
              formData.append('subtitle', subtitle)
              formData.append('time', time)
              formData.append('date', date)

              fetch('http://localhost/wddassignment/examdate.php', {
                  method: 'post',
                  body: formData
                })
                .then(resp => resp.text()
                  .then(txt => {
                    console.log(txt)
                    if (txt == 'ok') {
                      alert('Exam scheduled successfully!')
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