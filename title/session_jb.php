<?php

$jbid = "";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["jbid"])) {
    $jbid = $_SESSION["jbid"];
} else {
    header('Location: index.php');
    exit();
}
