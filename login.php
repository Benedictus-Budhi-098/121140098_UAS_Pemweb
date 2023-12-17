<?php
//Benedictus Budhi Dharmawan
//121140098
//Pemrograman Web RB

//file ini merupakan file php html yang berfungsi sebagai halaman awal dalam melakukan login

//memulai session serta memanggil file koneksi.php dan DataHandler.php agar dapat menggunakan
//fungsi php yang telah dibuat
session_start();
include "koneksi.php";
include "DataHandler.php";

// pengecekan apakah pengguna sudah login
if (isset($_SESSION['user'])) {
    //jika sudah, maka akan dilakukan redirect ke halaman utama
    header("Location: index.php");
    exit();
}

// pengecekan apakah form login telah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $dataHandler = new DataHandler($db);

    // deklarasi komponen username dan password untuk dilakukan validasi login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // memanggil fungsi checkUsername dengan variabel username untuk mengecek apakah username
    //terdata pada tabel tab_acc
    if ($dataHandler->checkUsername($username)) {
        // jika akun terdaftar, set session dan redirect ke halaman utama
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit();
    } else {
        // jika gagal, set pesan error
        $error = "Username atau password salah";
    }

    // Tutup koneksi database
    $db->closeConnection();
}

// pengecekan event jika tombol logout diklik
if (isset($_GET['logout'])) {
    // jika iya, maka hapus session dan redirect ke halaman login
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!-- tampilan utama dari web -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_log.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h1>Selamat Datang, Wahai Duelist !</h1>
        <h3>Wakilkan Kampusmu dan Jadilah Top Duelist se-Indonesia</h3>
        
        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <!-- form tempat untuk melakukan login -->
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            
            <button type="submit">Login</button>
        </form>
        
        <!-- tombol yang akan redirect jika user ingin melakukan registrasi akun -->
        <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
    </div>
</body>
</html>
