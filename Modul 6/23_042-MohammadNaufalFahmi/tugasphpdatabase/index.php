<?php
session_start();
// Data pengguna (username dan password)
$users = array(
    "Naufal" => "password123",
);
// Verifikasi login
$login_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty($username) || empty($password)) {
        $login_error = "Username dan password harus diisi.";
    } elseif (isset($users[$username]) && $users[$username] == $password) {
        $_SESSION["username"] = $username;
        header("Location: homemain.php");
        exit();
    } else {
        $login_error = "Username atau password salah.";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(111,9,121,1) 17%, rgba(0,212,255,1) 100%);
        }
        .card {
            background: rgba(255, 255, 255, 0.8);
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
  </head>
  <body>
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card rounded-5 shadow overflow-hidden">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                            <form action="" method="POST">
                                <input type="text" name="username" id="username" class="form-control my-4 py-2" placeholder="Username">
                                <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password">
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary">Login</button>
                                </div>
                            </form>
                            <?php if (!empty($login_error)) { echo "<script>alert('$login_error');</script>"; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
