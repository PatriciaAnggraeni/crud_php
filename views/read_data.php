<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD PHP - Data Dosen</title>
  </head>
  <body>
    <h1 class="text-center">Data Dosen</h1>

    <div class="container">

        <!-- membuat tombol untuk menambah data dosen -->
        <a href="add_data.php" class="btn btn-success mt-5 mb-3">Tambah +</a>

        <!-- buat session untuk mengecek apakah data berhasil ditambahkan -->
        <?php 

            if ( empty($_GET['alert']) ) {
                echo "";
            } else if ( $_GET['alert'] == 1 ) {
                echo '
                    <div class="alert alert-primary" role="alert">
                        <strong>Data Dosen Berhasil Ditambahkan!</stromg>
                    </div>
                ';
            } else if ( $_GET['alert'] == 2 ) {
                echo '
                    <div class="alert alert-danger" role="alert">
                        <strong>Data Dosen Gagal Ditambahkan!</stromg>
                    </div>
                ';
            } else if ( $_GET['alert'] == 3 ) {
                echo '
                    <div class="alert alert-primary" role="alert">
                        <strong>Data Dosen Berhasil Dirubah!</stromg>
                    </div>
                ';
            } else if ( $_GET['alert'] == 4 ) {
                echo '
                    <div class="alert alert-success" role="alert">
                        <strong>Data Dosen Berhasil Dihapus!</stromg>
                    </div>
                ';
            }  

        ?>

        <table class="table mt-2">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Pengampu</th>
                <th scope="col">Tingkatan</th>
                <th scope="col">Edit Data</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                    // import file DosenController ke sini
                    require_once "../controller/DosenController.php";

                    // membuat objek dari class tersebut
                    $dosen = new DosenController;

                    // memanggil method dan tampilkan data dalam bentuk array asosiatif
                    $data = $dosen->read_data();

                    $nomor = 1;
                
                ?>

                <!-- mengecek apakah ada data yang ditangkap -->
                <?php if ( count($data) > 0 ): ?>

                    <!-- jika iya. maka tampilkan data -->
                    <?php foreach( $data as $row ): ?>
                        
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $row->nip ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->pengampu ?></td>
                            <td><?= $row->tingkatan ?></td>
                            <td>
                                <a href="edit_data.php?page=edit_data&id=<?= $row->id_dosen ?>" class="btn btn-warning"">Ubah</a>
                                <a href="../process/data_process.php?id=<?= $row->id_dosen ?>" class="btn btn-danger"  onclick="return confirm('Apakah yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>

                    <?php endforeach ?>
                
                <?php endif ?>

            </tbody>
        </table>

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

<!-- buat tag script agar menghilangkan tanda ?alert=nilai di route dan alertnya -->
<script>
    function refreshPage() { window.location = "http://localhost/crud_php/views/dosen.php"; }

    if ( performance.navigation.type == performance.navigation.TYPE_RELOAD ) refreshPage();

</script>