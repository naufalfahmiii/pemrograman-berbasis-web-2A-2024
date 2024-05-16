<?php
session_start();

// Data pengguna (username dan password)
$users = array(
    "NaufalGanteng" => "password123",
    "NaufalKeren" => "password224"
);

// Verifikasi login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($users[$username]) && $users[$username] == $password) {
        $_SESSION["username"] = $username;
        header("Location: home.php");
        exit();
    } else {
        $login_error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container1">
        <h2>Login</h2>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Login">
            <?php if (isset($login_error)) { echo "<p class='error'>$login_error</p>"; } ?>
        </form>
    </div>
    
</body>

</html>
