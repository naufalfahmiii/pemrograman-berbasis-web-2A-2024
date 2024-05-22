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
// Jika formulir disubmit, lakukan penambahan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $umur = $_POST["umur"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $prodi = $_POST["prodi"];
    $jurusan = $_POST["jurusan"];
    $asal_kota = $_POST["asal_kota"];
    $sql = "INSERT INTO profil (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";
    if ($koneksi->query($sql) === TRUE) {
        echo "DATA BERHASIL DITAMBAH";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    // Redirect ke halaman data mahasiswa setelah penambahan
    header("Location: data.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa Baru</title>
     <!-- font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(111, 9, 121, 1) 17%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Input Data Mahasiswa</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required><br>
            <label for="nim">NIM:</label>
            <input type="text" name="nim" required><br>
            <label for="umur">Umur:</label>
            <input type="number" name="umur" required><br>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select><br>
            <label for="prodi">Prodi:</label>
            <input type="text" name="prodi" required><br>
            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" required><br>
            <label for="asal_kota">Asal Kota:</label>
            <input type="text" name="asal_kota" required><br>
            <input type="submit" value="Submit">
            <a class="batal" href="data.php">Batal</a>
        </form>
    </div>
</body>
</html>
