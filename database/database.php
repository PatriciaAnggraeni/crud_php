<?php

// membuat konfirgurasi koneksi ke database menggunakan konsep oop

class Database {

    // membuat proprerti class
    private $dbHost = "127.0.0.1";
    private $dbUser = "AnggaSusilo";
    private $dbPassword = "Anggara27042022";
    private $dbName = "crud_php";

    // membuat method untuk koneksi ke database
    public function connect() {

        // buat variabel untuk menampung hasil koneksi database
        $mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);

        // buat kondisi jika koneksi ke database berhasil
        if ( $mysqli->connect_error ) {
            echo "koneksi ke database gagal [" . $mysqli->connect_error . "]";
        }

        // kembalikan nilai dari koneksi
        return $mysqli;
    }
}

// membuat objek database
// $connectToDb = new Database();
// $connectToDb->connect()

?>