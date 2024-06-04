<?php
include 'session_jb.php';
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jobseeker_id = $_SESSION['jbid'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $bday = $_POST['bday'];
    $phone = $_POST['phone'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];

    // You may need to validate and sanitize the input data

    $query = "UPDATE tbl_jobseekers SET 
              name = '$name',
              email = '$email',
              bday = '$bday',
              phone = '$phone',
              education = '$education',
              experience = '$experience',
              skills = '$skills'
              WHERE id = $jobseeker_id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $response = array(
            'title' => 'Success',
            'message' => 'Profile updated successfully',
            'redirect_url' => 'jb_profile.php' // Adjust the URL accordingly
        );
    } else {
        $response = array(
            'title' => 'Error',
            'message' => 'Error updating profile. Please try again later.'
        );
    }

    echo json_encode($response);
} else {
    // Handle unauthorized access or other cases
    header('HTTP/1.0 403 Forbidden');
    echo "Forbidden";
}
?>
