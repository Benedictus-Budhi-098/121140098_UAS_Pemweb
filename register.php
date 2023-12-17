<?php
//Benedictus Budhi Dharmawan
//121140098
//Pemrograman Web RB

//file ini digunakan untuk melakukan registrasi akun (username dan password) yang akan disimpan dalam tabel
//sql tab_acc pada database

session_start();

//memulai session serta memanggil file koneksi.php dan DataHandler.php agar dapat menggunakan
//fungsi php yang telah dibuat
include "koneksi.php";
include "DataHandler.php";

$db = new Database();
$dataHandler = new DataHandler($db);

// pegecekan jika pengguna sudah login, redirect ke halaman utama
if (isset($_SESSION['user'])) {
    //jika sudah, pengguna akan diredirect ke halaman utama
    header("Location: index.php");
    exit();
}

// pengecekan apakah form pendaftaran telah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash password untuk menjaga privasi

    // pengecekkan apakah username sudah digunakan
    $existingData = $dataHandler->checkUsername($username);
    //jika belum, maka data akan ditambahkan ke dalam tabel tab_acc
    if (!$existingData) {
        $dataHandler->registerUser($username, $hashedPassword);

        // Set session dan redirect ke halaman utama dengan akun yang baru terdaftar
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Username sudah digunakan";
    }
}
?>

<!-- halaman web register -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_reg.css">
    <title>Register</title>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>

        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <!-- form untuk melakukan input registrasi -->
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            
            <button type="submit">Register</button>
        </form>
        
        <!-- tombol untuk melakukan direct pengguna ke halaman login -->
        <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
    </div>
</body>
</html>
