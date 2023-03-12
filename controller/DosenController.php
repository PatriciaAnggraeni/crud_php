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

    // buat method untuk mengedi data dosen
    public function edit_data( $id ) {

        // buat objek database baru
        $db = new Database;

        // buat query myswl untuk mengambil data berdasarkan id
        $sql = "SELECT * FROM dosen WHERE id_dosen = '$id'";

        // tampung hasil di sebuah variabel
        $result = $db->connect()->query($sql)->fetch_object();

        // setelah itu, tutup koneksinya
        $db->connect()->close();

        // kembalikan nilai result
        return $result;
    }

    // membuat method untuk menambahkan data dosen
    public function save_edit_data( $id, $nip, $nama, $pengampu, $tingkatan ) {

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
        $sql = "UPDATE dosen SET 
                nama = '$nama',
                nip = '$nip',
                pengampu = '$pengampu',
                tingkatan = '$tingkatan' 
                WHERE id_dosen = '$id';";

        // eksekusi query mysql di atas dan membuat sebuah session
        $result = $mysqli->query($sql);

        if ( $result ) {
            // redirect halaman ke read_data.php agar data dapat langsung ditampilkan dan menampilkan pesan bahwa data berhasil ditambahkan
            header('Location: ../views/read_data.php?alert=3');
        } else {
            // redirect halaman ke read_data.php agar data dapat langsung ditampilkan dan menampilkan pesan bahwa data gagal ditambahkan
            header('Location: ../views/read_data.php?alert=2');
        }

        $mysqli->close();
    }

    // buat method untuk melakukan hapus data
    public function delete_data( $id ) {

        // buat objek database baru
        $db = new Database;

        // buat query myswl untuk mengambil data berdasarkan id
        $sql = "DELETE FROM dosen WHERE id_dosen = '$id';";

        // tampung hasil di sebuah variabel
        $result = $db->connect()->query($sql);

        if ( $result ) {
            // redirect halaman ke read_data.php agar data dapat langsung ditampilkan dan menampilkan pesan bahwa data berhasil ditambahkan
            header('Location: ../views/read_data.php?alert=4');
        } else {
            // redirect halaman ke read_data.php agar data dapat langsung ditampilkan dan menampilkan pesan bahwa data gagal ditambahkan
            header('Location: ../views/read_data.php?alert=2');
        }

        // setelah itu, tutup koneksinya
        $db->connect()->close();
    }
}

?>