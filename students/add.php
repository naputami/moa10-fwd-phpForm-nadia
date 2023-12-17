<?php 

require_once '../connection.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$level = $_POST['level'];

$query = "INSERT INTO students (name, phone, address, level) VALUES ('$name', '$phone', '$address', '$level')";

if($conn->query($query) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

?>