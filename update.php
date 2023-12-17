<?php 

require_once 'connection.php';


$id = $_POST['sessionID'];
$date = $_POST['date'];
$studentID = $_POST['studentID'];
$teacherID = $_POST['teacherID'];


$query = "UPDATE sessions
SET sessions.session_date = '$date', 
sessions.studentID = $studentID, 
sessions.teacherID = $teacherID 
WHERE sessions.sessionID = $id";

echo $query . "<br>";

if($conn->query($query) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

?>