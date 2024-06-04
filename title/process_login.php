<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        $output = json_encode(array('type' => 'error', 'text' => 'Please enter credentials!'));
        die($output);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $output = json_encode(array('type' => 'error', 'text' => 'Please enter a valid email!'));
        die($output);
    }

    if ($conn->connect_error) {
        $output = json_encode(array('type' => 'error', 'text' => 'Error connecting' . $conn->connect_error));
        die($output);
    }

    // Admin Login
    $stmtA = $conn->prepare("SELECT * FROM tbl_admin WHERE email = ? AND password = ?");
    $stmtA->bind_param("ss", $email, $password);
    $stmtA->execute();
    $resultA = $stmtA->get_result();

    if ($resultA->num_rows > 0) {
        $rowA = $resultA->fetch_assoc();
        session_start();
        $_SESSION["aid"] = $rowA["id"];
        $_SESSION["login_admin"] = $rowA["name"];
        session_regenerate_id();
        $output = json_encode(array('type' => 'success', 'text' => 'Login successful' . $_SESSION["login_admin"], 'redirect_url' => 'a_home.php'));
        die($output);
    }

    // Employer login
    $stmtE = $conn->prepare("SELECT * FROM tbl_employers WHERE email = ? AND password = ?");
    $stmtE->bind_param("ss", $email, $password);
    $stmtE->execute();
    $resultE = $stmtE->get_result();

    if ($resultE->num_rows > 0) {
        $rowE = $resultE->fetch_assoc();
        session_start();
        $_SESSION["eid"] = $rowE["id"];
        $_SESSION["login_employer"] = $rowE["name"];
        session_regenerate_id();
        $output = json_encode(array('type' => 'success', 'text' => 'Login successful' . $_SESSION["login_employer"], 'redirect_url' => 'e_home.php'));
        die($output);
    }

    // Jobseeker login
    $stmtJ = $conn->prepare("SELECT * FROM tbl_jobseekers WHERE email = ? AND password = ?");
    $stmtJ->bind_param("ss", $email, $password);
    $stmtJ->execute();
    $resultJ = $stmtJ->get_result();

    if ($resultJ->num_rows > 0) {
        $rowJ = $resultJ->fetch_assoc();
        session_start();
        $_SESSION["jbid"] = $rowJ["id"];
        $_SESSION["login_jobseeker"] = $rowJ["name"];
        session_regenerate_id();
        $output = json_encode(array('type' => 'success', 'text' => 'Login successful' . $_SESSION["login_jobseeker"], 'redirect_url' => 'jb_home.php'));
        die($output);
    } else {
        $output = json_encode(array('type' => 'error', 'text' => 'Invalid credentials!'));
        die($output);
    }
}
?>
