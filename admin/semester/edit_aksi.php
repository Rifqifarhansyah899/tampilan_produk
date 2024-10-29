<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil data dari formulir
$kd_semester = $_POST['kd_semester'];
$semester = $_POST['semester'];

// Mengupdate data semester di database
$query = "UPDATE tbl_semester SET semester = '$semester' WHERE kd_semester = '$kd_semester'";
if (mysqli_query($koneksi, $query)) {
    // Berhasil, alihkan ke halaman utama
    header("Location: index.php");
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
