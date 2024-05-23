<?php
if (isset($_GET["session_id"])) {
    $session_id = $_GET["session_id"];
    include "dbconnection.php";
    // Prepare and execute SQL statement to delete data
    $sql = "DELETE FROM sessions WHERE session_id = $session_id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}

header("location: /onlinetutor/sessionview.php");
exit;
?>