<?php
$host = 'sql306.infinityfree.com';
$user = 'if0_38850287';
$password = 'WSBSOw9waKf';
$dbname = 'if0_38850287_attendance_db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
