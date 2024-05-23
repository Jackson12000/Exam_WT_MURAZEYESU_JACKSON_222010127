<?php
if (isset($_GET["notification_id"])) {
    $notification_id = $_GET["notification_id"];
    include "dbconnection.php";
    // Prepare and execute SQL statement to delete data
    $sql = "DELETE FROM notification WHERE notification_id = $notification_id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}

header("location: /onlinetutor/notificationview.php");
exit;
?>