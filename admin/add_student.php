<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h2>Add Student</h2>

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success" id="success-alert">
            Student registered successfully!
        </div>
        <script>
            setTimeout(function () {
                const alert = document.getElementById("success-alert");
                if (alert) {
                    alert.style.display = "none";
                }
            }, 2000); // disappears after 2 seconds
        </script>
    <?php endif; ?>

    <form action="../backend/register.php" method="POST">
        <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
        <input type="text" name="reg_no" class="form-control mb-3" placeholder="Registration Number" required>
        <button type="submit" class="btn btn-success">Register</button>
    </form>

</body>
</html>
