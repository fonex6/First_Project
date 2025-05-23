<?php
require 'db.php';

$sql = "SELECT students.name, students.reg_no, attendance.date, attendance.time 
        FROM attendance 
        JOIN students ON attendance.reg_no = students.reg_no 
        ORDER BY attendance.date DESC, attendance.time DESC";

$result = $conn->query($sql);

echo "<table class='table table-bordered'>";
echo "<thead><tr><th>Name</th><th>Reg No</th><th>Date</th><th>Time</th></tr></thead>";
echo "<tbody>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['reg_no']}</td>
            <td>{$row['date']}</td>
            <td>{$row['time']}</td>
          </tr>";
}

echo "</tbody></table>";
$conn->close();
?>
