<?php 

require "page/koneksi.php";
$pemasukan = ambil("SELECT  * FROM tb_keluar");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             KAS KELUAR
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form class="d-flex" style="width: 120px;">  
                                <input class="form-control ms-auto" type="search" placeholder="Search" aria-label="Search" id="Search" value=" Search">
                            </form>   
                           </div>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr class="text-center">
                                            <th>id</th>
                                            <th>nama barang</th>
                                            <th>tanggal</th>
                                            <th>keterangan</th>
                                            <th>jumlah</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i =1;?>
                                        <?php foreach ($pemasukan as $keluar) :?>
                                        <tr class="odd gradeX">
                                            <td align="center"><?php echo $i?></td>
                                            <td><?php echo $keluar ['nama_barang'];?></td>
                                            <td><?php echo $keluar['tanggal'];?></td>
                                            <td><?php echo $keluar ['keterangan'];?></td>
                                            <td><?php echo $keluar ['jumlah'];?></td>
                                            <td>
                                                <a href="" class="btn btn-primary">edit</a>
                                                <a href="" class="btn btn-danger">hapus</a>
                                            </td>
                                            <?php $i++?>
                                        <?php endforeach ;?>
                                        </tr>
                                        
                    
                                        
</body>
</html>
