<?php
require 'db.php';

// Pokea registration number kutoka kwa form
$reg_no = isset($_POST['scan_reg_no']) ? trim($_POST['scan_reg_no']) : '';
$date = date("Y-m-d");
$time = date("H:i:s");

if ($reg_no !== '') {
    $sql = "INSERT INTO attendance (reg_no, date, time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $reg_no, $date, $time);

    if ($stmt->execute()) {
        echo "<script>
            alert('Attendance recorded for $reg_no!');
            window.location.href = '../index.php';
        </script>";
    } else {
        echo "<script>
            alert('Error recording attendance: " . $stmt->error . "');
            window.location.href = '../index.php';
        </script>";
    }

    $stmt->close();
} else {
    echo "<script>
        alert('Please enter a registration number!');
        window.location.href = '../index.php';
    </script>";
}

$conn->close();
?>
