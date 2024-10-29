<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Popper.js dan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>

    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../login.php?pesan=belum_login");
    }
    ?>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h2>Halaman Admin</h2>
            </div>
            <div class="card-body">
                <h4 class="text-center">Selamat datang, <strong><?php echo $_SESSION['username']; ?></strong>! Anda telah login.</h4>

                <div class="mt-4">
                    <h5>Master Data</h5>
                    <div class="d-flex justify-content-around">
                    <a href="dosen/index.php" class="btn btn-outline-primary">Data Dosen</a>
                        <a href="krs/index.php" class="btn btn-outline-primary">Data Mahasiswa</a>
                        <a href="matakuliah/index.php" class="btn btn-outline-primary">Data Matakuliah</a>
                        <a href="semester/index.php" class="btn btn-outline-primary">Data Semester</a>
                    </div>
                </div>

                <div class="mt-4">
                    <h5>Transaksi</h5>
                    <div class="d-flex justify-content-around">
                        <a href="jadwal" class="btn btn-outline-success">Buat Jadwal</a>
                        <a href="krs" class="btn btn-outline-success">KRS Mahasiswa</a>
                    </div>
                </div>

                <div class="mt-4">
                    <h5>Pengaturan</h5>
                    <div class="d-flex justify-content-center">
                        <a href="user" class="btn btn-outline-warning">Kelola Data User</a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>
