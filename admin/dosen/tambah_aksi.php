<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil data dari formulir
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

// Menambahkan data dosen ke database
$query = "INSERT INTO tbl_dosen (nama, alamat) VALUES ('$nama', '$alamat')";
if (mysqli_query($koneksi, $query)) {
    // Berhasil, alihkan ke halaman utama
    header("Location: index.php");
} else {
    echo "Error adding record: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
