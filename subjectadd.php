<?php 
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] =='POST') {
  $name = $_POST["name"];
  $description= $_POST["description"];
  $level= $_POST["level"];
 
  
  if ( empty($name) || empty($description) || empty($level)) {
    $errorMessage = "All fields are required";
  } else {
    $sql = "INSERT INTO subjects ( name, description,level) " . "VALUES ('$name', '$description', '$level')";
    $result = $connection->query($sql);
    if (!$result) {
      $errorMessage = "Invalid query: " . $connection->error;
    } else {
      echo "Added correctly";
      header("location: /onlinetutor/subjectview.php");
      exit;
    }
  }
}
?>
