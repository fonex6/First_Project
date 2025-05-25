<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Attendance System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Student Attendance System</h2>
        <a href="admin/login.php" class="btn btn-dark">Admin Login</a>

    </div>

    <!-- Success alert placeholder -->
    <div id="success-alert" class="alert alert-success d-none" role="alert">
        Student registered successfully!
    </div>

    <!-- Registration Form -->
    <form action="backend/register.php" method="POST" class="mb-5">
        <input class="form-control mb-3" type="text" name="name" placeholder="Full Name" required>
        <input class="form-control mb-3" type="text" name="reg_no" placeholder="Registration Number" required>
        <button class="btn btn-primary" type="submit">Register Student</button>
    </form>

    <h2 class="mb-4">Scan Attendance (Simulated)</h2>

    <!-- Attendance Form -->
    <form action="backend/scan.php" method="POST" class="mb-5">
        <input class="form-control mb-3" type="text" name="scan_reg_no" placeholder="Enter Reg Number (from QR)" required>
        <button class="btn btn-success" type="submit">Mark Attendance</button>
    </form>

   <h3 class="mb-3">
    Attendance Records - <?php echo date("l, d M Y"); ?>
</h3>


    <!-- Display Records -->
    <iframe src="backend/fetch.php" width="100%" style="height: 400px; border: none; border-radius: 12px; background-color: #ffffff;"></iframe>

    <!-- Success alert logic -->
    <script>
        const params = new URLSearchParams(window.location.search);
        if (params.get("success") === "1") {
            document.getElementById("success-alert").classList.remove("d-none");
        }
    </script>

</body>
</html>
