<?php
if (isset($_GET["tutor_id"])) {
    $tutor_id = $_GET["tutor_id"];
    include "dbconnection.php";
    // Prepare and execute SQL statement to delete data
    $sql = "DELETE FROM tutors WHERE tutor_id = $tutor_id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}

header("location: /onlinetutor/tutorview.php");
exit;
?>