<?php
//Benedictus Budhi Dharmawan
//121140098
//Pemrograman Web RB

//Merupakan file utama yang dapat menerima input
//file ini terhubung dengan beberapa fungsi dan file php agar dapat menyimpan data input
//ke dalam database

//inputan akan dicek dulu pada file script.js untuk memastikan input yang dilakukan
//sesuai dengan permintaan

session_start();
//memulai session pada php

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {

    //jika belum, maka akan diarahkan ke halaman login
    header("Location: login.php");
    exit();
}

//jika terjadi event ketika request method post berupa logout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {

    // Hapus session dan redirect ke halaman login
    session_destroy();
    header("Location: login.php");
    exit();
}

//memanggil file koneksi dan datahandler yang berperan dalam koneksi dengan database
include "koneksi.php";
include "DataHandler.php";

$db = new Database();
$dataHandler = new DataHandler($db);

//jika terjadi event berupa user yang menekan tombol submit :
if (isset($_POST['submit'])) {

    //maka akan memanggil fungsi addData data agar data yang telah diinputkan dapat disimpan ke dalam database
    $dataHandler->addData($_POST['name'], $_POST['age'], $_POST['gender'], $_POST['date'], $_POST['campus']);
    $_SESSION['message'] = "Data berhasil ditambahkan";
}

//jika terjadi event berupa user yang menekan tombol remove
if (isset($_POST['remove'])) {

    //maka akan memanggil fungsi removeData untuk menghapus data terkait
    $dataHandler->removeData($_POST['remove']);
    $removed_data = $_POST['remove'];
    $_SESSION['message'] = "Data dengan nama $removed_data berhasil dihapus";
}

//deklarasi pemanggilan database agar dapat ditampilkan
$data = $dataHandler->getData();
$db->closeConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pendaftaran YCL</title>
</head>
<body>
    <div class="container">
        <h1>Form Pendaftaran Yu-Gi-Oh Campus League</h1>
        <!-- merupakan bagian awal web, dimana user yang sedang mengakses akan ditampilkan -->
        <h3>Selamat datang, <?php echo $_SESSION['user']; ?></h3>

        <!-- form tempat untuk menginputkan data user -->
        <form method="post">
            <label for="name">Nama :</label>
            <input type="text" id="name" name="name" required>
            <br>

            <label for="age">Umur :</label>
            <input type="number" id="age" name="age" required>
            <br>

            <label for="gender">Jenis Kelamin</label>
            <select id="gender" name="gender" required>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <br>

            <label for="date">Tanggal lahir :</label>
            <input type="date" name="date" required>
            <br>
            
            <label for="campus">Asal Kampus :</label>
            <input type="text" id="campus" name="campus" required>
            <br>
            
            <!-- tombol yang terhubung dengan php untuk event submit -->
            <button type="submit" name="submit" value="add">Tambah Data</button>
        </form>
        <br><br>

        <!-- tombol yang terhubung dengan php untuk event menghapus (removeData) -->
        <form method="post">
            <label for="remove">Hapus Data (berdasarkan nama):</label>
            <input type="text" id="remove" name="remove" required>
            <button type="submit">Hapus</button>
        </form>
        <br><br>

        <!-- tabel yang terhubung dengan tabel database sehingga dapat menampilkan data -->
        <h2>Data Tabel</h2>
        <table id="dataTable" border="1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Asal Kampus</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php

                //fungsi untuk menampilkan setiap data yang tercatat di dalam database dengan iterasi
                foreach ($data as $row) {
                    echo "
                    <tr>
                        <td>{$row['Nama']}</td>
                        <td>{$row['Umur']}</td>
                        <td>{$row['Gender']}</td>
                        <td>{$row['Tanggal']}</td>
                        <td>{$row['Kampus']}</td>   
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <br>

        <!-- tombol yang terhubung dengan php untuk event logout -->
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
