<?php
include 'dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $lesson_id=$_POST['lesson_id'];
    $amount=$_POST['amount'];
    $payment_date=$_POST['payment_date'];
    $payment_method=$_POST['payment_method'];
    $sql="INSERT INTO payments(lesson_id,amount,payment_date,payment_method) VALUES('$lesson_id','$amount','$payment_date','$payment_method')";
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