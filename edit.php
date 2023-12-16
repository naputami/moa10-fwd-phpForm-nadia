<?php 

require_once 'connection.php';

$id = $_GET['id'];

$session = $conn->query("SELECT sessions.sessionID, DATE_FORMAT(sessions.session_date, '%Y-%m-%d' ) AS session_date, sessions.teacherID, sessions.studentID FROM sessions WHERE sessions.sessionID = $id");

if ($session->num_rows > 0) {
  $session = $session->fetch_assoc();
  $queryGetStudents = "SELECT students.studentID, students.name FROM students";
  $students = $conn->query($queryGetStudents);
  $queryGetTeachers = "SELECT teachers.teacherID, teachers.name FROM teachers";
  $teachers = $conn->query($queryGetTeachers);
} else {
  header('Location: index.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Session Data</title>
  </head>
  <body>

    <div class="container">
      <h1>Edit</h1>
      <form action="update.php" method="POST">
        <input type="text" name="sessionID" value="<?php echo $session['sessionID'] ?>" hidden>
      <div class="mb-3">
        <label for="title" class="form-label">Date</label>
        <input type="date" class="form-control" id="date" name="date" required value="<?php  echo $session['session_date'] ?>">
      </div>

      <div class="mb-3">
        <label for="student" class="form-label">Student name</label>
        <select class="form-select" aria-label="Select student name" id="student" name="studentID" required>
          <option disabled>Choose student</option>
          <?php 
            if ($students->num_rows > 0) {
              // output data of each row
              while($row = $students->fetch_assoc()) {
                
                if($row['studentID'] === $session['studentID']) { ?>
                  <option selected value="<?php echo $row['studentID'] ?>"> <?php echo $row['name'] ?></option>
                <?php
                } else { ?> 
                  <option value="<?php echo $row['studentID'] ?>"> <?php echo $row['name'] ?></option>
                
                <?php } ?> 
              <?php }
            } else {
              ?> 
              <option selected disabled>No data here!</option>
            <?php } ?>
        </select>
      </div>


      <div class="mb-3">
        <label for="teacher" class="form-label">Teacher name</label>
        <select class="form-select" aria-label="Select teacher name" id="teacher" name="teacherID" required>
          <option disabled>Choose teacher</option>
          <?php 
            if ($teachers->num_rows > 0) {
              // output data of each row
              while($row = $teachers->fetch_assoc()) {
                
                if($row['teacherID'] === $book['teacherID']) { ?>
                  <option selected value="<?php echo $row['teacherID'] ?>"> <?php echo $row['name'] ?></option>
                <?php
                } else { ?> 
                  <option value="<?php echo $row['teacherID'] ?>"> <?php echo $row['name'] ?></option>
                
                <?php } ?> 
              <?php }
            } else {
              ?> 
              <option selected disabled>No data here!</option>
            <?php } ?>
        </select>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
