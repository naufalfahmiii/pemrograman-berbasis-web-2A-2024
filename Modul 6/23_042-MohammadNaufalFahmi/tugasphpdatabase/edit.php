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
// Mendapatkan NIM dari URL
$nim = $_GET['nim'];
// Membuat query untuk mengambil data mahasiswa
$sql = "SELECT * FROM profil WHERE nim='$nim'";
$result = $koneksi->query($sql);
// Memeriksa apakah data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan.";
    exit();
}
// Memproses data saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];
    $updateSql = "UPDATE profil SET nama='$nama', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE nim='$nim'";
    if ($koneksi->query($updateSql) === TRUE) {
        header("Location: data.php");
    } else {
        echo "Error: " . $updateSql . "<br>" . $koneksi->error;
    }
}
$koneksi->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
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
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Mahasiswa</h2>
        <form method="POST" action="">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
            <label for="umur">Umur:</label>
            <input type="number" name="umur" value="<?php echo $row['umur']; ?>" required><br>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="L" <?php if($row['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-laki</option>
                <option value="P" <?php if($row['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
            </select><br>
            <label for="prodi">Prodi:</label>
            <input type="text" name="prodi" value="<?php echo $row['prodi']; ?>" required><br>
            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br>
            <label for="asal_kota">Asal Kota:</label>
            <input type="text" name="asal_kota" value="<?php echo $row['asal_kota']; ?>" required><br>
            <input type="submit" value="Update">
            <a class="batal" href="data.php">Batal</a>
        </form>
    </div>
</body>
</html>
