<?php
if (isset($_GET["subject_id"])) {
    $subject_id = $_GET["subject_id"];
    include "dbconnection.php";
    // Prepare and execute SQL statement to delete data
    $sql = "DELETE FROM subjects WHERE subject_id = $subject_id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}

header("location: /onlinetutor/subjectview.php");
exit;
?>