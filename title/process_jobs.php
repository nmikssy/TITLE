<?php
include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitPost'])) {
    $eid = $_POST['eid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $qualifications = $_POST['qualifications'];
    $salary = $_POST['salary'];
    $location = $_POST['location'];
    $work_sched = $_POST['work_sched'];
    $work_arrangement = $_POST['work_arrangement'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tbl_jobs (eid, title, description, qualifications, salary, location, work_sched, work_arrangement, status) 
            VALUES ('$eid', '$title', '$description', '$qualifications', '$salary', '$location', '$work_sched', '$work_arrangement', '$status')";

    if (mysqli_query($conn, $sql)) {
        $response = [
            'title' => 'Success',
            'message' => 'Job posted successfully',
            'redirect_url' => 'e_home.php'  
        ];
    } else {
        $response = [
            'title' => 'Error',
            'message' => 'Error posting job: ' . mysqli_error($conn)
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
