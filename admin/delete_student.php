<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require '../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reg_no'])) {
    $reg_no = $_POST['reg_no'];
    $stmt = $conn->prepare("DELETE FROM students WHERE reg_no = ?");
    $stmt->bind_param("s", $reg_no);
    $stmt->execute();
    $stmt->close();
}

// After deletion, redirect back to dashboard
header("Location: dashboard.php");
exit();
