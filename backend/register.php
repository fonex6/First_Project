<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $reg_no = trim($_POST['reg_no']);

    if (!empty($name) && !empty($reg_no)) {
        // Check for duplicates
        $check = $conn->prepare("SELECT * FROM students WHERE reg_no = ?");
        $check->bind_param("s", $reg_no);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Student already exists!'); window.history.back();</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO students (name, reg_no) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $reg_no);
            if ($stmt->execute()) {
                header("Location: ../admin/add_student.php?success=1");
                exit();
            } else {
                echo "<script>alert('Error occurred while registering student.'); window.history.back();</script>";
            }
        }
    } else {
        echo "<script>alert('Please fill in all fields.'); window.history.back();</script>";
    }

    $conn->close();
} else {
    header("Location: ../admin/add_student.php");
    exit();
}
-