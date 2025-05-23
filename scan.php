<?php
require 'db.php';

$reg_no = $_POST['scan_reg_no'];
$date = date("Y-m-d");
$time = date("H:i:s");

$sql = "INSERT INTO attendance (reg_no, date, time) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $reg_no, $date, $time);

if ($stmt->execute()) {
    echo "Attendance recorded for $reg_no!";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
