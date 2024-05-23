<?php
include 'dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id=$_POST['student_id'];
    $tutor_id=$_POST['tutor_id'];
    
    $booking_date=$_POST['booking_date'];
    $payment_status=$_POST['payment_status'];
    $sql="INSERT INTO booking(student_id, tutor_id, booking_date, payment_status) VALUES('$student_id','$tutor_id','$booking_date', '$payment_status')";
    $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header('location:booking.php');
        exit();
    }else{
        echo "Inserted fail";
      }
}

?>