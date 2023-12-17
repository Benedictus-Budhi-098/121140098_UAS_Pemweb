<?php
//Benedictus Budhi Dharmawan
//121140098
//Pemrograman Web RB

//file ini merupakan file php yang digunakan untuk menghubungkan web dengan database

//deklarasi koneksi dilakukan menggunakan konsep OOP
class Database {
    private $host = "localhost";
    private $username = "id21683784_root";
    private $password = "Benedictus_4321";
    private $database = "id21683784_db_uas";
    private $connection;

    //fungsi untuk deklarasi koneksi database dengan mysqli
    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    //fungsi untuk menyalakan koneksi agar terhubung dengan database
    public function getConnection() {
        return $this->connection;
    }

    //fungsi untuk mematikan koneksi agar terputus dengan database
    public function closeConnection() {
        $this->connection->close();
    }
}
?>
