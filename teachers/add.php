<?php 

require_once '../connection.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$subject = $_POST['subject'];

$query = "INSERT INTO teachers (name, phone, address, subject) VALUES ('$name', '$phone', '$address', '$subject')";

if($conn->query($query) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

?>