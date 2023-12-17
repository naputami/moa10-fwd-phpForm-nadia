<?php 

require_once '../connection.php';


$id = $_POST['teacherID'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];


$query = "UPDATE teachers
SET teachers.name = '$name', 
teachers.address = '$address', 
teachers.phone = '$phone',
teachers.subject = '$subject' 
WHERE teachers.teacherID = $id";

echo $query . "<br>";

if($conn->query($query) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

?>