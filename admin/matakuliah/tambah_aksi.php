<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil data dari formulir
$id_matkul = $_POST['id_matkul'];
$nama = $_POST['nama'];
$sks = $_POST['sks'];

// Menambahkan data KRS ke database
$query = "INSERT INTO tbl_krs (id_matkul, nama, sks) VALUES ('$id_matkul', '$nama', '$sks')";
if (mysqli_query($koneksi, $query)) {
    // Berhasil, alihkan ke halaman utama
    header("Location: index.php");
} else {
    echo "Error adding record: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
