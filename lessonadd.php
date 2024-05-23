<?php
include 'dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id=$_POST['student_id'];
    $tutor_id=$_POST['tutor_id'];
    $subject_id=$_POST['subject_id'];
    $duration=$_POST['duration'];
    $lesson_status=$_POST['lesson_status'];
    $sql="INSERT INTO lessons(student_id, tutor_id, subject_id, duration, lesson_status) VALUES('$student_id','$tutor_id','$subject_id','$duration', '$lesson_status')";
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