<?php 

require_once '../connection.php';

$id = $_GET['id'];


$query = "DELETE FROM students WHERE students.studentID = $id";

echo $query . "<br>";

if($conn->query($query) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

?>