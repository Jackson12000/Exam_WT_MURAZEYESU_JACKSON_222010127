<?php
if (isset($_GET["review_id"])) {
    $review_id = $_GET["review_id"];
    include "dbconnection.php";
    // Prepare and execute SQL statement to delete data
    $sql = "DELETE FROM review WHERE review_id = $review_id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}

header("location: /onlinetutor/reviewdata.php");
exit;
?>