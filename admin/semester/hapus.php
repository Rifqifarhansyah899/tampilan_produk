<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil Kode Semester dari URL
$kd_semester = $_GET['kd_semester'];

// Menghapus data semester dari database
$query = "DELETE FROM tbl_semester WHERE kd_semester = '$kd_semester'";
if (mysqli_query($koneksi, $query)) {
    // Berhasil, alihkan ke halaman utama
    header("Location: index.php");
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
