<?php

$koneksi = mysqli_connect("Localhost", "root", "","buku_kas");    

function ambil($ambil)
{
    global $koneksi;
    // mengambil data dari lemari kemudian masukkan ke tampat khusus untuk di berikan ke teman

    $result = mysqli_query($koneksi, $ambil);
    // kemudian siapkan tempat kosong nya untuk menaruk baju nya

    $rows = [];
    // kemudian lakukan looping

    while ($seleksi = mysqli_fetch_assoc($result)) {
        $rows[] = $seleksi;
    }

    return $rows;
}
?>