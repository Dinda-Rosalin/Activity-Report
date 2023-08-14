<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kegiatan Kominfo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <?php
    session_start();
    include '../koneksi/koneksi.php';

    if (!isset($_SESSION['username'])) {
        header('Location: ../login-out-reg/login.php');
        exit();
    }

    $role = $_SESSION['role']; // Ambil peran pengguna dari session

    if ($role === 'admin') {
        include '../navbar/header-admin.php'; // Include header untuk admin
    } else {
        include '../navbar/header-user.php'; // Include header untuk user
    }

    // Query untuk mengambil daftar kegiatan yang ditambahkan oleh admin
    $sql = "SELECT * FROM kegiatan ORDER BY tanggal DESC";
    $result = $conn->query($sql);
    ?>

    <div class="container mt-5">
    <div class="text-center">
        <h2>Kegiatan Terbaru BPSDM</h2>
        <p>Temukan berbagai kegiatan menarik yang telah diadakan oleh Kominfo.</p>
    </div>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../uploads/<?php echo $row['gambar']; ?>" class="card-img-top" alt="Gambar Kegiatan">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                            <p class="card-text"><?php echo $row['tanggal']; ?></p>
                            <a href="detail-kegiatan.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <?php include "../navbar/footer.php" ?>
</body>
</html>
