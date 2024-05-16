<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
// Ambil data mahasiswa dari session
$students = isset($_SESSION['students']) ? $_SESSION['students'] : array();
// Data mahasiswa (contoh data)
// $students = array(
//     array("nim" => "123456", "nama" => "John Doe", "alamat" => "Jl. Raya No. 123", "angkatan" => "2020"),
//     array("nim" => "654321", "nama" => "Jane Smith", "alamat" => "Jl. Mawar No. 456", "angkatan" => "2019")
// );

// Fungsi untuk menampilkan data mahasiswa dalam tabel
function displayStudents($students) {
    echo "<table border='1'>";
    echo "<tr><th>NIM</th><th>Nama</th><th>Alamat</th><th>Angkatan</th><th>Action</th></tr>";
    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>" . $student['nim'] . "</td>";
        echo "<td>" . $student['nama'] . "</td>";
        echo "<td>" . $student['alamat'] . "</td>";
        echo "<td>" . $student['angkatan'] . "</td>";
        echo "<td><a href='edit.php?nim=" . $student['nim'] . "'>Edit</a> | <a href='delete.php?nim=" . $student['nim'] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div class="home-container">
        <h2>Data Mahasiswa</h2>
        <?php displayStudents($students); ?>
        <br>
        <div class="links">
        <a href="add.php">Tambah Mahasiswa Baru</a>
        <br><br>
        <a href="home.php">Kembali ke Halaman Home</a>
        <br><br>
        <a href="logout.php">Logout</a>
        </div>
    </div>
</body>

</html>
