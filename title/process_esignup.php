<?php
include 'connection.php';

function sanitizeData($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeData($_POST['name']);
    $email = sanitizeData($_POST['email']);
    $password = sanitizeData($_POST['password']);
    $cpassword = sanitizeData($_POST['cpassword']);

    if (empty($name) || empty($email) || empty($password) || empty($cpassword)) {
        echo json_encode(array('title' => 'Error', 'message' => 'Please fill in all required fields.'));
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['title' => 'Error', 'message' => 'Please enter valid email.']);
        exit;
    }

    if (strlen($password) < 8 || strlen($password) > 16) {
        echo json_encode(['title' => 'Error', 'message' => 'Password must be between 8 and 16 characters long.']);
        exit;
    }

    if ($password !== $cpassword) {
        echo json_encode(['title' => 'Error', 'message' => 'Passwords do not match.']);
        exit;
    }

    $query = "INSERT INTO tbl_employers (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(['title' => 'Success', 'message' => 'Account created successfully!', 'redirect_url' => 'login.php']);
    } else {
        echo json_encode(['title' => 'Error', 'message' => 'Error creating account.']);
    }

    mysqli_close($conn);
} else {
    header('Location: index.php');
    exit;
}
?>
