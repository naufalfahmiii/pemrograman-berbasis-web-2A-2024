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

// Periksa apakah parameter nim ada
if (isset($_GET['nim'])) {
    $nim = $koneksi->real_escape_string($_GET['nim']);

    // Membuat query untuk menghapus data
    $sql = "DELETE FROM profil WHERE nim = '$nim'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "NIM tidak ditemukan";
}

// Menutup koneksi
$koneksi->close();

// Redirect kembali ke halaman data mahasiswa
header("Location: data.php");
exit();
?>
