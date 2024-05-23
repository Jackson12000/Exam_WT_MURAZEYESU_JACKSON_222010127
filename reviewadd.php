<?php
include 'dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $tutor_id=$_POST['tutor_id'];
    $student_id=$_POST['student_id'];
    $commentAll=$_POST['commentAll'];
    $sql="INSERT INTO review(tutor_id,student_id,commentAll) VALUES('$tutor_id','$student_id','$commentAll')";
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