<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil kode dosen dari URL
$kd_dosen = $_GET['kd_dosen'];

// Menghapus data dosen dari database
$query = "DELETE FROM tbl_dosen WHERE kd_dosen='$kd_dosen'";
if (mysqli_query($koneksi, $query)) {
    // Berhasil, alihkan ke halaman utama
    header("Location: index.php");
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
