<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Admin Dashboard</h2>
        <div>
            <a href="add_student.php" class="btn btn-primary me-2">Add Student</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <h4 class="mb-3">Registered Students</h4>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Registration Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../backend/db.php';
            $sql = "SELECT * FROM students ORDER BY id ASC";
            $result = $conn->query($sql);
            $count = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $count++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['reg_no']) . "</td>";
                    echo "<td>
                            <form action='delete_student.php' method='POST' onsubmit=\"return confirm('Are you sure you want to delete this student?');\" style='display:inline;'>
                                <input type='hidden' name='reg_no' value='" . htmlspecialchars($row['reg_no']) . "'>
                                <button type='submit' class='btn btn-sm btn-danger'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No students found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

</body>
</html>
