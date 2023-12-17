<?php 

require_once '../connection.php';


$id = $_POST['studentID'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$level = $_POST['level'];


$query = "UPDATE students
SET students.name = '$name', 
students.address = '$address', 
students.phone = '$phone',
students.level = '$level' 
WHERE students.studentID = $id";

echo $query . "<br>";

if($conn->query($query) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

?>