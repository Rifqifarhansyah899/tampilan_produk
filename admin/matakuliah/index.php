<?php
// Koneksi ke database
include '../../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Mata Kuliah</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil data mata kuliah dari tabel
                $query = "SELECT * FROM tbl_matkul";
                $result = mysqli_query($koneksi, $query);

                // Cek apakah ada data yang ditemukan
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['id_matkul'] . "</td>";
                        echo "<td>" . $data['nama'] . "</td>";
                        echo "<td>" . $data['sks'] . "</td>";
                        echo "<td>
                            <a href='edit.php?id_matkul=" . $data['id_matkul'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus.php?id_matkul=" . $data['id_matkul'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
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
