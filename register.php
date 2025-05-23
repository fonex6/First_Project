<?php
require 'db.php';

// Sanitize and validate inputs
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$reg_no = isset($_POST['reg_no']) ? trim($_POST['reg_no']) : '';

if ($name !== '' && $reg_no !== '') {
    $sql = "INSERT INTO students (name, reg_no) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $reg_no);

    if ($stmt->execute()) {
        // Show success message then redirect
        echo "<script>
            alert('Student registered successfully!');
            window.location.href = '/fnx2/index.html';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<script>
        alert('Please fill in all fields!');
        window.location.href = '/fnx2/index.html';
    </script>";
}

$conn->close();
?>
