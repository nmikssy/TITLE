<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitPost'])) {
    $pid = $_POST['pid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $qualifications = $_POST['qualifications'];
    $salary = $_POST['salary'];
    $location = $_POST['location'];
    $work_sched = $_POST['work_sched'];
    $work_arrangement = $_POST['work_arrangement'];
    $status = $_POST['status'];

    $query = "UPDATE tbl_jobs SET 
        title = '$title',
        description = '$description',
        qualifications = '$qualifications',
        salary = '$salary',
        location = '$location',
        work_sched = '$work_sched',
        work_arrangement = '$work_arrangement',
        status = '$status'
        WHERE id = $pid";

    if (mysqli_query($conn, $query)) {
        $response = [
            'title' => 'Success',
            'message' => 'Job updated successfully',
            'redirect_url' => 'e_home.php'
        ];
    } else {
        $response = [
            'title' => 'Error',
            'message' => 'Error updating job: ' . mysqli_error($conn)
        ];
    }

    echo json_encode($response);
} else {
    echo json_encode([
        'title' => 'Error',
        'message' => 'Invalid request method'
    ]);
}
?>
