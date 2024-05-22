<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost"; 
$username = "root";
$password = ""; 
$database = "form";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Membuat query untuk mengambil data
$sql = "SELECT * FROM profil";
$result = $koneksi->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
     <!-- font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body{
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(111, 9, 121, 1) 17%, rgba(0, 212, 255, 1) 100%);
        }
        h2{
            color:white;
        }
    </style>
</head>
<body>
    <div class="home-container">
        <h2>Data Mahasiswa</h2>
        <table border='1'>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Prodi</th>
                <th>Jurusan</th>
                <th>Asal Kota</th>
                <th>Action</th>
            </tr>
            <?php
            // Memeriksa apakah ada data yang ditemukan
            if ($result->num_rows > 0) {
                // Menampilkan data baris per baris
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['nim'] . "</td>";
                    echo "<td>" . $row['umur'] . "</td>";
                    echo "<td>" . $row['jenis_kelamin'] . "</td>";
                    echo "<td>" . $row['prodi'] . "</td>";
                    echo "<td>" . $row['jurusan'] . "</td>";
                    echo "<td>" . $row['asal_kota'] . "</td>";
                    echo "<td><a href='edit.php?nim=" . $row['nim'] . "'>Edit</a> | <a href='delete.php?nim=" . $row['nim'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data yang ditemukan.</td></tr>";
            }
            // Menutup koneksi
            $koneksi->close();
            ?>
        </table>
        <br>
        <div class="links">
            <a href="add.php">Tambah Data Mahasiswa</a>
            <br><br>
            <a href="homemain.php">Kembali ke Halaman Home</a>
            <br><br>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
