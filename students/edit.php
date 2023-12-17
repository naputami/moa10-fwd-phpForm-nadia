<?php 

require_once '../connection.php';

$id = $_GET['id'];

$student = $conn->query("SELECT * FROM students WHERE students.studentID = $id");

if ($student->num_rows > 0) {
  $student = $student->fetch_assoc();
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

    <title>Edit Student Data</title>
  </head>
  <body>

    <div class="container w-50 mt-3">
      <h1>Edit Student Data</h1>
      <form action="update.php" method="POST">
        <input type="text" name="studentID" value="<?php echo $student['studentID'] ?>" hidden>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="name" class="form-control" id="name" name="name" required value="<?php  echo $student['name'] ?>">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="address" class="form-control" id="address" name="address" required value="<?php  echo $student['address'] ?>">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="phone" class="form-control" id="phone" name="phone" required value="<?php  echo $student['phone'] ?>">
      </div>
      <div class="mb-3">
        <label for="level" class="form-label">Level</label>
        <select class="form-select" aria-label="select level student" id="level" name="level" required>
          <option disabled>Choose level</option>
          <?php 
            $options = array('SMP', 'SD', 'SMA');
            foreach($options as $item){
                if($item == $student['level']){
                    ?> <option selected value="<?php echo $item ?>"><?php echo $item ?></option>
                <?php
                } else {
                    ?><option value="<?php echo $item ?>"><?php echo $item ?></option>
                <?php
                }
            }
            ?> 
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
