<?php
if (isset($_GET["booking_id"])) {
    $booking_id = $_GET["booking_id"];
    include "dbconnection.php";
    // Prepare and execute SQL statement to delete data
    $sql = "DELETE FROM booking WHERE booking_id = $booking_id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}

header("location: /onlinetutor/bookingview.php");
exit;
?>