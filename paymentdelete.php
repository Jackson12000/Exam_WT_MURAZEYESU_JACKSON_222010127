<?php
if (isset($_GET["payment_id"])) {
    $payment_id = $_GET["payment_id"];
    include "dbconnection.php";
    // Prepare and execute SQL statement to delete data
    $sql = "DELETE FROM payments WHERE payment_id = $payment_id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}

header("location: /onlinetutor/paymentview.php");
exit;
?>