<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil data dari formulir
$kd_dosen = $_POST['kd_dosen'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

// Melakukan pembaruan data di database
$query = "UPDATE tbl_dosen SET nama='$nama', alamat='$alamat' WHERE kd_dosen='$kd_dosen'";
if (mysqli_query($koneksi, $query)) {
    // Berhasil, alihkan ke halaman utama
    header("Location: index.php");
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
