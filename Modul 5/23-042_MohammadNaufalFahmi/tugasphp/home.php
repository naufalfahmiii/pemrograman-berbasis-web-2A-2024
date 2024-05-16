<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body>
    <div class="home-container">
        <div class="box">
            <h2>Selamat datang, <?php echo $username; ?></h2>
            <p>Ini adalah halaman home.</p>
            <div class="links">
                <a class ="links" href="mahasiswa.php">datamhs</a>
                <a class ="links" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
