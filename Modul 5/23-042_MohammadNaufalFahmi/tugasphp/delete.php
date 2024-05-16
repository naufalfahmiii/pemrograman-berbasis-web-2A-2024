<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
// Ambil data mahasiswa dari sesi
$students = isset($_SESSION['students']) ? $_SESSION['students'] : array();

// Periksa apakah parameter nim telah diberikan
if (!isset($_GET["nim"])) {
    header("Location: mahasiswa.php");
    exit();
}

// Ambil NIM dari parameter
$nim = $_GET["nim"];

// Temukan indeks mahasiswa dengan NIM yang sesuai
$index = null;
foreach ($students as $key => $student) {
    if ($student["nim"] == $nim) {
        $index = $key;
        break;
    }
}

// Jika mahasiswa tidak ditemukan, kembalikan ke halaman mahasiswa
if ($index === null) {
    header("Location: mahasiswa.php");
    exit();
}

// Hapus data mahasiswa
unset($students[$index]);

// Simpan kembali data mahasiswa ke dalam sesi
$_SESSION['students'] = $students;

// Redirect ke halaman mahasiswa setelah hapus
header("Location: mahasiswa.php");
exit();
?>
