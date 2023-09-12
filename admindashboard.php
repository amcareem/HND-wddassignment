<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "wddlms";

$conn = new mysqli($servername, $username, $pass, $dbname);

$students_data = $conn->query("SELECT * FROM student ;")->fetch_all();
$lecturers_data = $conn->query("SELECT * FROM lecturer ;")->fetch_all();
?>
<!doctype html>
<html lang="en">

<head>
  <title>Admin Dashboard</title>
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

          <a name="logout" id="logout" class="btn btn-warning" onclick="window.location = 'http://localhost/wddassignment'" role="button">Logout</a>

        </div>
      </div>
    </div>
  </header>

  <div class="container my-5 ">
    <div class="row">
      <div class="col-md-12 mx-auto">
        <div class="card card-body">
          <h1 class="text-secondary text-center mb-4"> </i>Admin Dashboard </h1>
          <!-- Admin Tabs -->
          <ul class="nav nav-tabs md-tabs d-flex justify-content-center my-4" id="myTabMD" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="admin-tab-md" data-toggle="tab" href="#registered-student" role="tab" aria-controls="registered-student-md" aria-selected="true">Registered Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="registered-lecturer-tab-md" data-toggle="tab" href="#registered-lecturer-md" role="tab" aria-controls="registered-lecturer-md" aria-selected="false">Registered Lecturers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="add-lecturer-tab-md" data-toggle="tab" href="#add-lecturer-md" role="tab" aria-controls="add-lecturer-md" aria-selected="false">Add Lecturer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="add-student-tab-md" data-toggle="tab" href="#add-student-md" role="tab" aria-controls="add-student-md" aria-selected="false">Add Student</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="edit-student-tab-md" data-toggle="tab" href="#edit-student-md" role="tab" aria-controls="edit-student-md" aria-selected="false">Edit Student</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="edit-lecturer-tab-md" data-toggle="tab" href="#edit-lecturer-md" role="tab" aria-controls="edit-lecturer-md" aria-selected="false">Edit Lecturer</a>
            </li>
          </ul>
          <div class="tab-content card pt-5" id="myTabContentMD">
            <div class="tab-pane fade show active" id="registered-student" role="tabpanel" aria-labelledby="registered-student-md">
              <h2 class="h2 text-center text-secondary">All Registered Students</h2>

              <div class="container">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover my-3" table_type="student">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th colspan="2">Registered Courses</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($students_data as $student) {
                        echo <<<SD
                        <tr>
                          <td scope='row'> $student[4] </td>
                          <td> $student[0] </td>
                          <td> $student[1] </td>
                          <td> $student[2] </td>
                          <td> $student[3] </td>
                          <td style="cursor: pointer; color: #ef476f" title="delete" onclick="removeRecord(this)" > <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i> </td>
                        </tr>
                        SD;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="registered-lecturer-md" role="tabpanel" aria-labelledby="registered-lecturer-tab-md">
              <h2 class="h2 text-center text-secondary">All Registered Lecturers</h2>

              <div class="container">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover my-3" table_type="lecturer">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th colspan="2">Designation</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($lecturers_data as $lecturer) {
                        echo <<<LD
                        <tr>
                          <td scope='row'> $lecturer[0] </td>
                          <td> $lecturer[1] </td>
                          <td> $lecturer[2] </td>
                          <td> $lecturer[3] </td>
                          <td> $lecturer[4] </td>
                          <td style="cursor: pointer; color: #ef476f" title="delete" onclick="removeRecord(this)" > <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i> </td>
                        </tr>
                        LD;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="add-lecturer-md" role="tabpanel" aria-labelledby="add-lecturer-tab-md">
              <h2 class="h2 text-center text-primary mt-3">New Lecturer</h2>

              <form class="d-flex flex-column justify-content-center align-items-center mt-5" form_type="lecturer">
                <div class="form-group w-50">
                  <label for="id">Lecturer ID</label>
                  <input type="text" class="form-control" name="id" id="add_lecturer_id" aria-describedby="helpId" placeholder="Enter your id" minlength="6" required>
                </div>
                <div class="form-group w-50">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" name="name" id="add_lecturer_name" placeholder="Enter your name" required>
                </div>
                <div class="form-group w-50">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="add_lecturer_email" placeholder="Enter your email" required>
                </div>
                <div class="form-group w-50">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="add_lecturer_address" placeholder="Enter your address" required>
                </div>
                <div class="form-group w-50">
                  <label for="designation">Designation</label>
                  <input type="text" class="form-control" name="designation" id="add_lecturer_designation" placeholder="Associate Professor">
                </div>
                <div class="form-group w-50">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="add_lecturer_password" placeholder="Enter your password" minlength="6" required>
                </div>
                <a name="add" id="add" class="btn btn-primary w-25 mb-4 mt-2 text-white" onclick="addLecturer()" role="button">Add</a>
              </form>
            </div>
            <div class="tab-pane fade" id="add-student-md" role="tabpanel" aria-labelledby="add-student-tab-md">
              <h2 class="h2 text-center text-primary mt-3">New Student</h2>

              <form class="d-flex flex-column justify-content-center align-items-center mt-5" form_type="student">
                <div class="form-group w-50">
                  <label for="id">Student ID</label>
                  <input type="text" class="form-control" name="id" id="add_student_id" aria-describedby="helpId" placeholder="Enter your id" minlength="6" required>
                </div>
                <div class="form-group w-50">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" name="name" id="add_student_name" placeholder="Enter your name" required>
                </div>
                <div class="form-group w-50">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="add_student_email" placeholder="Enter your email" required>
                </div>
                <div class="form-group w-50">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="add_student_address" placeholder="Enter your address" required>
                </div>
                <div class="form-group w-50">
                  <label for="courses">Courses</label>
                  <input type="text" class="form-control" name="courses" id="add_student_courses" placeholder="CRP, WDD, DSA">
                </div>
                <div class="form-group w-50">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="add_student_password" placeholder="Enter your password" minlength="6" required>
                </div>
                <a name="add" id="add" class="btn btn-primary w-25 mb-4 mt-2 text-white" onclick="addStudent()" role="button">Add</a>
              </form>
            </div>
            <div class="tab-pane fade" id="edit-student-md" role="tabpanel" aria-labelledby="edit-student-tab-md">
              <h2 class="h2 text-center text-primary mt-3">Enter ID to Edit</h2>

              <form class="d-flex flex-column justify-content-center align-items-center mt-5" form_type="student_edit">
                <div class="form-group w-50">
                  <label for="id">Student ID</label>
                  <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Enter your id" minlength="6" onchange="editStudentIDChanged(this.value)" required>
                </div>
                <div class="form-group w-50">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group w-50">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group w-50">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address" required>
                </div>
                <div class="form-group w-50">
                  <label for="courses">Courses</label>
                  <input type="text" class="form-control" name="courses" id="courses" placeholder="CRP, WDD, DSA" required>
                </div>
                <div class="form-group w-50">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" minlength="6" required>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="hash" id="hash" value="" checked required>
                    Hash Password?
                  </label>
                </div>
                <a name="add" id="add" class="btn btn-primary w-25 mb-4 mt-2 text-white" href="#" onclick="editStudent()" role="button">Edit</a>
              </form>
            </div>
            <div class="tab-pane fade" id="edit-lecturer-md" role="tabpanel" aria-labelledby="edit-lecturer-tab-md">
              <h2 class="h2 text-center text-primary mt-3">Enter ID to Edit</h2>

              <form class="d-flex flex-column justify-content-center align-items-center mt-5" form_type="lecturer_edit">
                <div class="form-group w-50">
                  <label for="id">Lecturer ID</label>
                  <input type="text" class="form-control" name="id" id="lecturer_edit_id" aria-describedby="helpId" placeholder="Enter your id" minlength="6" onchange="editLecturerIDChanged(this.value)" required>
                </div>
                <div class="form-group w-50">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" name="name" id="lecturer_edit_name" placeholder="Enter your name" required>
                </div>
                <div class="form-group w-50">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="lecturer_edit_email" placeholder="Enter your email" required>
                </div>
                <div class="form-group w-50">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="lecturer_edit_address" placeholder="Enter your address" required>
                </div>
                <div class="form-group w-50">
                  <label for="courses">Designation</label>
                  <input type="text" class="form-control" name="designation" id="lecturer_edit_designation" placeholder="Associate Professor" required>
                </div>
                <div class="form-group w-50">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="lecturer_edit_password" placeholder="Enter your password" minlength="6" required>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="hash" id="lecturer_edit_hash" value="" checked required>
                    Hash Password?
                  </label>
                </div>
                <a name="add" id="add" class="btn btn-primary w-25 mb-4 mt-2 text-white" href="#" onclick="editLecturer()" role="button">Edit</a>
              </form>
            </div>
          </div>

          <script>
            function addLecturer() {
              const id = $('#add_lecturer_id').val()
              const name = $('#add_lecturer_name').val()
              const email = $('#add_lecturer_email').val()
              const address = $('#add_lecturer_address').val()
              const designation = $('#add_lecturer_designation').val()
              const password = $('#add_lecturer_password').val()

              const formData = new FormData()

              formData.append('id', id)
              formData.append('name', name)
              formData.append('email', email)
              formData.append('address', address)
              formData.append('designation', designation)
              formData.append('password', password)

              fetch('http://localhost/wddassignment/addlecturer.php', {
                  method: 'post',
                  body: formData
                })
                .then(resp => resp.text()
                  .then(txt => {
                    console.log(`Response Text: ${txt}`)
                    if (txt == 'ok') {
                      alert('Lecturer Added.')
                      location.reload()
                    } else if (txt == 'fail')
                      alert('Failed to add lecturer.')
                  }))
                .catch(err => console.error(err))
            }

            function addStudent() {
              const id = $('#add_student_id').val()
              const name = $('#add_student_name').val()
              const email = $('#add_student_email').val()
              const address = $('#add_student_address').val()
              const courses = $('#add_student_courses').val()
              const password = $('#add_student_password').val()

              const formData = new FormData()

              formData.append('id', id)
              formData.append('name', name)
              formData.append('email', email)
              formData.append('address', address)
              formData.append('courses', courses)
              formData.append('password', password)

              fetch('http://localhost/wddassignment/addstudent.php', {
                  method: 'post',
                  body: formData
                })
                .then(resp => resp.text()
                  .then(txt => {
                    console.log(`Response Text: ${txt}`)
                    if (txt == 'ok') {
                      alert('Student Added.')
                      location.reload()
                    } else if (txt == 'fail')
                      alert('Failed to add lecturer.')
                  }))
                .catch(err => console.error(err))
            }

            function removeRecord(node) {
              const id = node.parentElement.children[0].textContent.trim();
              const table_type = node.parentElement.parentElement.parentElement.getAttribute('table_type')

              const formData = new FormData()
              formData.append('id', id)
              formData.append('form_type', table_type)

              fetch('http://localhost/wddassignment/deleteuser.php', {
                  method: 'post',
                  body: formData
                })
                .then(resp => resp.text()
                  .then(txt => {
                    console.log(txt)
                    if (txt == 'ok') {
                      alert('Record deleted!')
                      location.reload()
                    } else if (txt == 'fail')
                      alert('Failed to delete data')
                  }))
                .catch(err => console.error(err))
            }

            function editStudent() {
              const id = $('form[form_type="student_edit"] #id').val()
              const name = $('form[form_type="student_edit"] #name').val()
              const email = $('form[form_type="student_edit"] #email').val()
              const address = $('form[form_type="student_edit"] #address').val()
              const course = $('form[form_type="student_edit"] #courses').val()
              const password = $('form[form_type="student_edit"] #password').val()
              const doHash = $('form[form_type="student_edit"] #hash').is(":checked")
              if (!id) {
                alert('Please enter an ID!')
                return
              }

              if (studentData.id && id.trim() !== studentData.id.trim())
                alert('ID cannot be changed!')
              else {
                const formData = new FormData()

                formData.append('id', id)
                formData.append('name', name)
                formData.append('email', email)
                formData.append('address', address)
                formData.append('courses', course)
                formData.append('password', password)
                formData.append('hash', doHash)
                formData.append('form_type', 'student')

                fetch('http://localhost/wddassignment/edituser.php', {
                    method: 'post',
                    body: formData
                  })
                  .then(resp => resp.text()
                    .then(txt => {
                      if (txt == 'ok') {
                        alert('Data updated!')
                        location.reload()
                      } else if (txt == 'fail')
                        alert('Failed to update data')
                    }))
                  .catch(err => console.error(err))
              }
            }

            function editStudentIDChanged(id) {
              fetch(`http://localhost/wddassignment/userdata.php?student=${id}`)
                .then(resp => resp.json()
                  .then(studentData => {
                    if (studentData !== null) {
                      $('form[form_type="student_edit"] #id').val(studentData.id)
                      $('form[form_type="student_edit"] #name').val(studentData.name)
                      $('form[form_type="student_edit"] #email').val(studentData.email)
                      $('form[form_type="student_edit"] #address').val(studentData.address)
                      $('form[form_type="student_edit"] #courses').val(studentData.courses)
                      $('form[form_type="student_edit"] #password').val(studentData.password)

                      window.studentData = studentData
                    }
                  })
                  .catch(err => console.error(err)))
            }

            function editLecturer() {
              const id = $('#lecturer_edit_id').val()
              const name = $('#lecturer_edit_name').val()
              const email = $('#lecturer_edit_email').val()
              const address = $('#lecturer_edit_address').val()
              const designation = $('#lecturer_edit_designation').val()
              const password = $('#lecturer_edit_password').val()
              const doHash = $('#lecturer_edit_hash').is(":checked")
              if (!id) {
                alert('Please enter an ID!')
                return
              }

              if (studentData.id && id.trim() !== studentData.id.trim())
                alert('ID cannot be changed!')
              else {
                const formData = new FormData()

                formData.append('id', id)
                formData.append('name', name)
                formData.append('email', email)
                formData.append('address', address)
                formData.append('designation', designation)
                formData.append('password', password)
                formData.append('hash', doHash)
                formData.append('form_type', 'lecturer')

                fetch('http://localhost/wddassignment/edituser.php', {
                    method: 'post',
                    body: formData
                  })
                  .then(resp => resp.text()
                    .then(txt => {
                      if (txt == 'ok') {
                        alert('Data updated!')
                        location.reload()
                      } else if (txt == 'fail')
                        alert('Failed to update data')
                    }))
                  .catch(err => console.error(err))
              }
            }

            function editLecturerIDChanged(id) {
              fetch(`http://localhost/wddassignment/userdata.php?lecturer=${id}`)
                .then(resp => resp.json()
                  .then(lecturerData => {
                    if (lecturerData !== null) {
                      const ld = lecturerData;
                      $('#lecturer_edit_id').val(ld['id'])
                      $('#lecturer_edit_name').val(ld['name'])
                      $('#lecturer_edit_email').val(ld['email'])
                      $('#lecturer_edit_address').val(ld['address'])
                      $('#lecturer_edit_designation').val(ld['designation'])
                      $('#lecturer_edit_password').val(ld['password'])

                      window.lecturerDate = lecturerDate
                    }
                  })
                  .catch(err => console.error(err)))
            }

            let studentData = {}
            let lecturerDate = {}
          </script>
          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>