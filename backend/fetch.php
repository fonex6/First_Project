<?php
require 'db.php';

// Fetch data by joining attendance and students table
$sql = "SELECT a.*, s.name FROM attendance a
        JOIN students s ON a.reg_no = s.reg_no
        ORDER BY a.date DESC, a.time DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Registration No</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
          </thead>';
    echo '<tbody>';

    $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$count}.</td>
                <td>{$row['name']}</td>
                <td>{$row['reg_no']}</td>
                <td>{$row['date']}</td>
                <td>{$row['time']}</td>
              </tr>";
        $count++;
    }

    echo '</tbody></table></div>';
} else {
    echo '<p class="text-danger">No attendance records found.</p>';
}

$conn->close();
?>
