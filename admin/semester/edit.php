<?php
// Koneksi ke database
include '../../koneksi.php';

// Mengambil Kode Semester dari URL
$kd_semester = $_GET['kd_semester'];

// Query untuk mendapatkan data semester berdasarkan kd_semester
$query = "SELECT * FROM tbl_semester WHERE kd_semester = '$kd_semester'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Semester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Data Semester</h2>
        <form action="edit_aksi.php" method="POST">
            <input type="hidden" name="kd_semester" value="<?php echo $data['kd_semester']; ?>">
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="text" class="form-control" id="semester" name="semester" value="<?php echo $data['semester']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
