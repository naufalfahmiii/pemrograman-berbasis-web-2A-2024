<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

// Data mahasiswa (contoh data)
$students = isset($_SESSION['students']) ? $_SESSION['students'] : array();

// Jika formulir disubmit, lakukan penambahan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $angkatan = $_POST["angkatan"];

    // Tambahkan data mahasiswa baru ke dalam array
    $new_student = array(
        "nim" => $nim,
        "nama" => $nama,
        "alamat" => $alamat,
        "angkatan" => $angkatan
    );
    $students[] = $new_student;
    // Simpan array mahasiswa ke dalam session
    $_SESSION['students'] = $students;

    // Redirect ke halaman mahasiswa setelah penambahan
    header("Location: mahasiswa.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa Baru</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="home-container-add">
    <h2 class="tambah">Tambah Mahasiswa Baru</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nim">NIM:</label><br>
            <input type="text" id="nim" name="nim"><br>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama"><br>
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat"><br>
            <label for="angkatan">Angkatan:</label><br>
            <input type="text" id="angkatan" name="angkatan"><br>
            <input type="submit" value="Tambah">
            <a class="batal" href="mahasiswa.php">Batal</a>
        </form>
        
    </div>
</body>

</html>
