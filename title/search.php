<?php
session_start();
include 'connection.php';

if (isset($_GET['q'])) {
    $searchQuery = $_GET['q'];

    $jbid = isset($_SESSION['jbid']) ? $_SESSION['jbid'] : null;

    $sql = "SELECT *, (SELECT title FROM tbl_employers WHERE id = tbl_jobs.eid) AS ename
            FROM tbl_jobs
            WHERE eid = ? 
              AND (title LIKE ? OR qualifications LIKE ? OR salary LIKE ? OR location LIKE ? OR work_sched LIKE ? OR work_arrangement LIKE ? OR status LIKE ?)
            ORDER BY date";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isssssss', $jbid, $searchQuery, $searchQuery, $searchQuery, $searchQuery, $searchQuery, $searchQuery, $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    } else {
        echo "Error in query: " . $stmt->error;
    }

    $stmt->close();
}
?>
