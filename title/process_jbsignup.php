<?php
include 'connection.php';

function sanitizeData($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeData($_POST['name']);
    $bday = sanitizeData($_POST['bday']);
    $email = sanitizeData($_POST['email']);
    $phone = sanitizeData($_POST['phone']);
    $password = sanitizeData($_POST['password']);
    $cpassword = sanitizeData($_POST['cpassword']);
    $education = sanitizeData($_POST['education']);
    $experience = sanitizeData($_POST['experience']);
    $skills = sanitizeData($_POST['skills']);

    if (empty($name) || empty($bday) || empty($email) || empty($phone) || empty($password) || empty($cpassword) || empty($education) || empty($experience) || empty($skills)) {
        echo json_encode(array('title' => 'Error', 'message' => 'Please fill in all required fields.'));
        exit();
    }

    if (!preg_match('/^[A-Za-z., ]+$/', $name)) {
        echo json_encode(array('title' => 'Error', 'message' => 'Invalid characters in the name.'));
        exit();
    }

    $dob = new DateTime($bday);
    $today = new DateTime();
    $age = $dob->diff($today)->y;
    if ($age < 18) {
        echo json_encode(array('title' => 'Error', 'message' => 'You must be 18 years old or above.'));
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array('title' => 'Error', 'message' => 'Please enter valid email.'));
        exit();
    }

    if (!preg_match('/^09\d{9}$/', $phone)) {
        echo json_encode(array('title' => 'Error', 'message' => 'Invalid phone number.'));
        exit();
    }

    if (strlen($password) < 8 || strlen($password) > 16) {
        echo json_encode(array('title' => 'Error', 'message' => 'Password must be between 8 and 16 characters.'));
        exit();
    }

    if ($password != $cpassword) {
        echo json_encode(array('title' => 'Error', 'message' => 'Passwords do not match.'));
        exit();
    }

    $query = "INSERT INTO tbl_jobseekers (name, bday, email, phone, password, education, experience, skills) VALUES ('$name', '$bday', '$email', '$phone', '$password', '$education', '$experience', '$skills')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(array('title' => 'Success', 'message' => 'Account created successfully!', 'redirect_url' => 'login.php'));
    } else {
        echo json_encode(array('title' => 'Error', 'message' => 'Error creating account.'));
    }
} else {
    echo json_encode(array('title' => 'Error', 'message' => 'Invalid request.'));
}
?>
