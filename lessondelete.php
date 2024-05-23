<?php
if (isset($_GET["lesson_id"])) {
    $lesson_id = $_GET["lesson_id"];
    include "dbconnection.php";
    // Prepare and execute SQL statement to delete data
    $sql = "DELETE FROM lessons WHERE lesson_id = $lesson_id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}

header("location: /onlinetutor/lessonview.php");
exit;
?>