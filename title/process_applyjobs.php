<?php
include 'connection.php';

if (isset($_POST['pid'], $_POST['jbid'], $_POST['date'], $_POST['status'])) {
    $pid = $_POST['pid'];
    $jbid = $_POST['jbid'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tbl_appliedjobs (pid, jbid, date, status) VALUES ('$pid', '$jbid', '$date', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Application is unsuccessful.";
}

$conn->close();
?>
