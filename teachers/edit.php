<?php 

require_once '../connection.php';

$id = $_GET['id'];

$teacher = $conn->query("SELECT * FROM teachers WHERE teachers.teacherID = $id");

if ($teacher->num_rows > 0) {
  $teacher = $teacher->fetch_assoc();
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

    <title>Edit teacher Data</title>
  </head>
  <body>

    <div class="container w-50 mt-3">
      <h1>Edit teacher Data</h1>
      <form action="update.php" method="POST">
        <input type="text" name="teacherID" value="<?php echo $teacher['teacherID'] ?>" hidden>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="name" class="form-control" id="name" name="name" required value="<?php  echo $teacher['name'] ?>">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="address" class="form-control" id="address" name="address" required value="<?php  echo $teacher['address'] ?>">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="phone" class="form-control" id="phone" name="phone" required value="<?php  echo $teacher['phone'] ?>">
      </div>
      <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="subject" class="form-control" id="subject" name="subject" required value="<?php  echo $teacher['subject'] ?>">
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
