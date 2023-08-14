<?php
session_start(); // Mulai session

if (isset($_SESSION['username'])) {
    // Jika sudah login, alihkan ke halaman sesuai peran
    if ($_SESSION['role'] === 'admin') {
        header('Location: ../admin/dashboard-admin.php');
    } else {
        header('Location: ../user/dashboard-user.php');
    }
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: #0A2647;">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="post" action="process_login.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role:</label>
                                <select name="role" class="form-select">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="text-center mb-3">
                                <a href="../login-out-reg/register.php">Register Disini</a>
                                <a href="../index.php" class="container px-4">Back</a>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn text-white" style="background-color: #0A2647;">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>


