<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil ID jadwal dari URL
$id_jadwal = $_GET['id_jadwal'];

// Menghapus data KRS dari database
$query = "DELETE FROM tbl_krs WHERE id_jadwal = '$id_jadwal'";
if (mysqli_query($koneksi, $query)) {
    // Berhasil, alihkan ke halaman utama
    header("Location: index.php");
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
