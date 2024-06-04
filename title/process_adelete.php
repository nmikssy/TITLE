<?php

include 'session_a.php';

if(isset($_GET['id'])){
    include 'connection.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_jobs WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: a_home.php');
        exit();
    } else {
        echo "Error Deleting Post: " . $conn->error;
    }
}

?>
