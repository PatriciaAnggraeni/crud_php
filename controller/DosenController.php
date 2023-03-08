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
}

?>