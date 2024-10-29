<?php
// Koneksi ke database
include '../../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Data KRS</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Jadwal</th>
                    <th>NIM</th>
                    <th>Kode Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil data KRS dari tabel
                $query = "SELECT * FROM tbl_sks";
                $result = mysqli_query($koneksi, $query);

                // Cek apakah ada data yang ditemukan
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['id_jadwal'] . "</td>";
                        echo "<td>" . $data['nim'] . "</td>";
                        echo "<td>" . $data['kode_semester'] . "</td>";
                        echo "<td>
                            <a href='edit.php?id_jadwal=" . $data['id_jadwal'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus.php?id_jadwal=" . $data['id_jadwal'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Tidak ada data ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
