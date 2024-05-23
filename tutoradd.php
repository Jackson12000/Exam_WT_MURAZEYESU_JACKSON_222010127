<?php
include 'dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name=$_POST['name'];
    $description=$_POST['description'];
    $subject_id=$_POST['subject_id'];
    $hourly_rate=$_POST['hourly_rate'];
    $availability=$_POST['availability'];
    $sql="INSERT INTO tutors(name, description, subject_id, hourly_rate, availability) VALUES('$name','$description','$subject_id','$hourly_rate', '$availability')";
    $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header('location:student.php');
        exit();
    }else{
        echo "Inserted fail";
      }
}

?>