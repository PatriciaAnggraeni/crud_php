<?php 

require_once "../controller/DosenController.php";

// cek apakah ada data yang dikirim
if ( isset($_POST['simpan_data']) ) {

    // buat variabel untuk menampung objek dari controller
    $data_dosen = new DosenController;
    
    // simpan data ke dalam variabel masing masing
    $nip = trim($_POST['nip']);
    $nama = trim($_POST['nama']);
    $pengampu = trim($_POST['pengampu']);
    $tingkatan = trim($_POST['tingkatan']);

    // passing setiap data yan dibutuhkan ke dalam method add_data
    $data_dosen->add_data( $nip, $nama, $pengampu, $tingkatan );
}

if ( isset($_POST['edit_data']) ) {

    $data_dosen = new DosenController;

    // simpan data ke dalam variabel masing masing
    $id = trim($_POST['id_dosen']);
    $nip = trim($_POST['nip']);
    $nama = trim($_POST['nama']);
    $pengampu = trim($_POST['pengampu']);
    $tingkatan = trim($_POST['tingkatan']);

    // passing setiap data yan dibutuhkan ke dalam method add_data
    $data_dosen->save_edit_data( $id, $nip, $nama, $pengampu, $tingkatan );
}

if ( isset($_GET['id']) ) {

    $data_dosen = new DosenController;

    // simpan data ke dalam variabel masing masing
    $id = trim($_GET['id']);

    // passing setiap data yan dibutuhkan ke dalam method add_data
    $data_dosen->delete_data( $id );
}


?>