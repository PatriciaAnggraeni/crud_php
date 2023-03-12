<?php 

    // buat variabel get
    $id = $_GET['id'];

    // cek menggunakan kondisi
    if ( isset($id) ) {
        // import file DosenController
        require_once "../controller/DosenController.php";

        // buat objek baru dari class tersebut dan kembalikan nilainya
        $dosen = new DosenController;
        
        // simpan hasil pemangillan method ke dalam sebuah variabel
        $data = $dosen->edit_data($id);

        // masukkan masing masing data ke dalam variabel
        $id_dosen = $data->id_dosen ?? '';
        $nip = $data->nip ?? '';
        $nama = $data->nama ?? '';
        $pengampu = $data->pengampu ?? '';
        $tingkatan = $data->tingkatan ?? '';
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD PHP - Ubah Data Dosen</title>
</head>
<body>
    <h1 class="text-center mb-5 ">Form Ubah Data Dosen</h1>

    <!-- membuat form untuk mengisi data dosen -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-5">
                <div class="card-body">
                    <form action="../process/data_process.php" method="POST">
                        
                        <!-- buat tag input dan hilangkan inputannya -->
                        <input type="hidden" name="id_dosen" value="<?= $id_dosen ?>">

                        <div class="mb-3">
                            <label for="nip" class="form-label">Nip Dosen</label>
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan nip dosen.." value="<?= $nip ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama dosen..." value="<?= $nama ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pengampu" class="form-label">Pengampu Matkul</label>
                            <input type="text" class="form-control" id="pengampu" name="pengampu" placeholder="Masukkan pengampu matkul..." value="<?= $pengampu ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tingkatan" class="form-label">Tingkatan Jabatan</label>
                            <input type="text" class="form-control" id="tingkatan" name="tingkatan" placeholder="Masukkan tingkatan jabatan..." value="<?= $tingkatan ?>">
                        </div>
                        
                        <button type="submit" name="edit_data" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
</html>