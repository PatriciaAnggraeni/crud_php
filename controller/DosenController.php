<?php

require_once "../database/database.php";

class DosenController {

    // membuat method untuk melakukan query sql
    public function read_data() {
        
        // membuat objek database baru
        $db = new Database();

        // buat query sqlnya
        $sql = "SELECT * FROM dosen";

        // kirim permintaan query
        $result = $db->connect()->query($sql);

        // tampung semua data yang didapat ke dalam sebuah array
        while ( $data = $result->fetch_object() ) {
            $data_dosen[] = $data;
        }

        // tutup koneksi ke database
        $result->close();

        // kembalikan nilai dari hasil query yang ditampung di array tadi
        return $data_dosen ?? "Data Dosen Masih Kosong";

    }

    // membuat method untuk menambahkan data dosen
    public function add_data( $nip, $nama, $pengampu, $tingkatan ) {

        // buat objek database untuk menyambungkan koneksi ke database
        $db = new Database;
        
        // buat variabel penampung dari koneksi database
        $mysqli = $db->connect();

        // isikan data ke dalam variabel parameter sesuai data
        $nip = $mysqli->real_escape_string($nip);
        $nama = $mysqli->real_escape_string($nama);
        $pengampu = $mysqli->real_escape_string($pengampu);
        $tingkatan = $mysqli->real_escape_string($tingkatan);

        // buat variabel untuk menam[ung query insert mysql
        $sql = "INSERT INTO dosen(nip, nama, pengampu, tingkatan) 
                VALUES ('$nip', '$nama', '$pengampu', '$tingkatan')";

        // eksekusi query mysql di atas dan membuat sebuah session
        $result = $mysqli->query($sql);

        if ( $result ) {
            // redirect halaman ke read_data.php agar data dapat langsung ditampilkan dan menampilkan pesan bahwa data berhasil ditambahkan
            header('Location: ../views/read_data.php?alert=1');
        } else {
            // redirect halaman ke read_data.php agar data dapat langsung ditampilkan dan menampilkan pesan bahwa data gagal ditambahkan
            header('Location: ../views/read_data.php?alert=2');
        }

        $mysqli->close();
    }
}

?>