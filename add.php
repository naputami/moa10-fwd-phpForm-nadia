<?php 

require_once 'connection.php';

$date = $_POST['date'];
$studentID = $_POST['studentID'];
$teacherID = $_POST['teacherID'];

$query = "INSERT INTO sessions (session_date, studentID, teacherID) VALUES ('$date', $studentID, $teacherID)";

if($conn->query($query) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

?>