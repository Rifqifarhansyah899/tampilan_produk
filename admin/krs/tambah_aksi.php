<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil data dari formulir
$id_jadwal = $_POST['id_jadwal'];
$nim = $_POST['nim'];
$kode_semester = $_POST['kode_semester'];

// Menambahkan data KRS ke database
$query = "INSERT INTO tbl_krs (id_jadwal, nim, kode_semester) VALUES ('$id_jadwal', '$nim', '$kode_semester')";
if (mysqli_query($koneksi, $query)) {
    // Berhasil, alihkan ke halaman utama
    header("Location: index.php");
} else {
    echo "Error adding record: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
