<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
// Data mahasiswa (contoh data)
$students = isset($_SESSION['students']) ? $_SESSION['students'] : array();

// Data mahasiswa (contoh data)
// $students = array(
//     array("nim" => "123456", "nama" => "John Doe", "alamat" => "Jl. Raya No. 123", "angkatan" => "2020"),
//     array("nim" => "654321", "nama" => "Jane Smith", "alamat" => "Jl. Mawar No. 456", "angkatan" => "2019")
// );

// Periksa apakah parameter nim telah diberikan
if (!isset($_GET["nim"])) {
    header("Location: mahasiswa.php");
    exit();
}

// Ambil NIM dari parameter
$nim = $_GET["nim"];

// Temukan mahasiswa dengan NIM yang sesuai
$student = null;
foreach ($students as $s) {
    if ($s["nim"] == $nim) {
        $student = $s;
        break;
    }
}

// Jika mahasiswa tidak ditemukan, kembalikan ke halaman mahasiswa
if ($student === null) {
    header("Location: mahasiswa.php");
    exit();
}

// Jika formulir disubmit, lakukan update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $angkatan = $_POST["angkatan"];

    // Update data mahasiswa
    foreach ($students as &$s) {
        if ($s["nim"] == $nim) {
            $s["nim"] = $new_nim;
            $s["nama"] = $nama;
            $s["alamat"] = $alamat;
            $s["angkatan"] = $angkatan;
            break;
        }
    }
    // Simpan kembali data mahasiswa ke dalam session
    $_SESSION['students'] = $students;

    // Redirect ke halaman mahasiswa setelah update
    header("Location: mahasiswa.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="home-container-edit">
        <h2>Edit Mahasiswa</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?nim=$nim"); ?>">
            <label for="nim">NIM:</label><br>
            <input type="text" id="nim" name="nim" value="<?php echo $student['nim']; ?>"><br>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo $student['nama']; ?>"><br>
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat" value="<?php echo $student['alamat']; ?>"><br>
            <label for="angkatan">Angkatan:</label><br>
            <input type="text" id="angkatan" name="angkatan" value="<?php echo $student['angkatan']; ?>"><br>
            <input type="submit" value="Update">
            <a class="batal" href="mahasiswa.php">Batal</a>
        </form>
    </div>
</body>

</html>
