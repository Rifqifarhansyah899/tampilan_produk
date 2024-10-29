<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil data dari formulir
$kd_semester = $_POST['kd_semester'];
$semester = $_POST['semester'];

// Menambahkan data semester ke database
$query = "INSERT INTO tbl_semester (kd_semester, semester) VALUES ('$kd_semester', '$semester')";
if (mysqli_query($koneksi, $query)) {
    // Berhasil, alihkan ke halaman utama
    header("Location: index.php");
} else {
    echo "Error adding record: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
