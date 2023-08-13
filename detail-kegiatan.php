<?php

session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kegiatan WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        header('Location: dashboard-user.php');
        exit();
    }
} else {
    header('Location: dashboard-user.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Kegiatan</title>
</head>
<body>
    <h2>Detail Kegiatan</h2>
    <a href="javascript:history.back()">Kembali</a>
    <nav>
        <ul>
            <li><a href="dashboard-user.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <h3><?php echo $row['judul']; ?></h3>
    <p><?php echo $row['tanggal']; ?></p>
    <p><?php echo $row['isi']; ?></p>
    <img src="uploads/<?php echo $row['gambar']; ?>" width="400">

</body>
</html>
