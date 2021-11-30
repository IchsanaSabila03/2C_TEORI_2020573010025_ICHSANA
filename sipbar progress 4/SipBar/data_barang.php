<?php
require "proses/koneksi.php";
  $select  = mysqli_query($conn, "SELECT * FROM tb_barang");
  //$hasil   = mysqli_fetch_array($select);

  //echo $hasil['nama_barang'];
?>
<!doctype html>
<html lang="en">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SIPBAR = Sistem Informasi Peminjaman Barang Jurusan TIK</title>
  </head>

  <body>
      <!--Header-->
      <?php
      require "header.php";
      ?>
      <!--Akhir Header-->

      <div class="container-fluid">
        <div class="row">
          <div class="col-3">
            <?php
            require "sidebar.php";
            ?>
          </div>
          <!--Akhir Sidebar-->
          <!--Content-->
          <div class="col-9">
          <h2>Data Barang</h2>
          <div class="card">
            <div class="card-header">
              Data Barang
            </div>
            <div class="card-body">
            <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Stok</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 0;
    foreach($select as $data) {
      $no++;
  ?>
    <tr>
      <th scope="row"><?php echo $no ?></th>
      <td><?php echo $data['kode_barang'] ?></td>
      <td><?php echo $data['nama_barang'] ?></td>
      <td><?php echo $data['keterangan'] ?></td>
      <td><?php echo $data['stok'] ?></td>
      <td>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $no ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></button>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modalhapus<?php echo $no ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></button>
      </td>
    </tr>

<!-- Modal ubah data barang -->
<div class="modal fade" id="exampleModal<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah data barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="proses/proses_edit_databarang.php" method="POST">
        <input type="hidden" name="kd_brg" value="<?php echo $data['kode_barang'];?>">
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Kode Barang:</label>
            <input type="text" class="form-control" id="recipient-name" value="<?php echo $data['kode_barang'];?>" disabled> 
            </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nama Barang:</label>
            <input name="nm_brg" type="text" class="form-control" id="recipient-name" value="<?php echo $data['nama_barang'];?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Keterangan:</label>
            <input name="ket" type="text" class="form-control" id="recipient-name" value="<?php echo $data['keterangan'];?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Stok:</label>
            <input name="stok" type="number" class="form-control" id="recipient-name" value="<?php echo $data['stok'];?>">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal ubah data barang -->

<!-- Modal hapus data barang -->
<div class="modal fade" id="Modalhapus<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus data barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data barang <?php echo $data['nama_barang'];?> ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal hapus data barang -->

    <?php } ?>
  </tbody>
</table>
        </div>
      </div>
    </div>
        <!--Akhir content-->
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