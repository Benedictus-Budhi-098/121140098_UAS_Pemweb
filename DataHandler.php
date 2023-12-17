<?php
//Benedictus Budhi Dharmawan
//121140098
//Pemrograman Web RB

//file ini merupakan file php yang menampung segala bentuk manipulasi data pada database
//manipulasi dilakukan dengan string sql

class DataHandler {
    private $db;

    //deklarasi untuk menghubungkan database
    public function __construct($db) {
        $this->db = $db;
    }

    //fungsi untuk mengamankan objek input dari injeksi SQL menggunakan metode real_escape_string
    public function addData($name, $age, $gender, $date, $campus) {
        $connection = $this->db->getConnection();
        $name = $connection->real_escape_string($name);
        $age = $connection->real_escape_string($age);
        $gender = $connection->real_escape_string($gender);
        $date = $connection->real_escape_string($date);
        $campus = $connection->real_escape_string($campus);

        //pengecekkan apakah data dengan nama tertentu sudah ada di dalam tabel tab_form
        $existingData = $connection->query("SELECT * FROM tab_form WHERE Nama = '$name'");
        //jika tidak ada, maka data dapat dimasukkan ke dalam tabel tab_form
        if ($existingData->num_rows == 0) {
            $query = "INSERT INTO tab_form (Nama, Umur, Gender, Tanggal, Kampus) VALUES ('$name', '$age', '$gender', '$date', '$campus')";
            $connection->query($query);
        }

    }

    //fungsi untuk mendapatkan data pada tab_form dalam database
    public function getData() {
        //pengaktifan koneksi dengan database
        $connection = $this->db->getConnection();
        //query sql untuk menampilkan data di dalam tabel tab_form
        $result = $connection->query("SELECT * FROM tab_form");

        //mengemas seluruh data dalam array untuk ditampilkan pada tabel di dalam file index.php
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    //fungsi untuk menghapus data berdasarkan nama yang diinputkan
    public function removeData($name) {
        //pengaktifan koneksi dengan database
        $connection = $this->db->getConnection();
        $name = $connection->real_escape_string($name);

        //query sql untuk menghapus data ketika sesuai dengan nama yang diinputkan
        $query = "DELETE FROM tab_form WHERE Nama = '$name'";
        $connection->query($query);
    }

    //fungsi untuk melakukan register akun baru
    public function registerUser($username, $hashedPassword) {
        //pengaktifan koneksi dengan database
        $connection = $this->db->getConnection();
        $username = $connection->real_escape_string($username);

        //memasukkan data username dan password (yang telah dienkripsi) baru ke dalam tabel tab_acc
        $query = "INSERT INTO tab_acc (username, password) VALUES ('$username', '$hashedPassword')";
        $connection->query($query);
    }

    //fungsi untuk autentikasi login dengan akun yang terdaftar
    public function checkUsername($username) {
        //pengaktifan koneksi dengan database
        $connection = $this->db->getConnection();
        $username = $connection->real_escape_string($username);

        //mengambil data akun yang sudah terdaftar di dalam tab_acc untuk memroses login
        $result = $connection->query("SELECT * FROM tab_acc WHERE username = '$username'");
        return $result->num_rows > 0;
    }
}
?>
