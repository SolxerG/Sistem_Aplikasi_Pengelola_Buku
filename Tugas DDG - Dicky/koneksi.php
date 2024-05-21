<?php 
    $koneksi = new mysqli("localhost", "root","","db_pplg3");

    if($koneksi) {
    }else {
        echo mysqli_error($koneksi);
    }

    $data_buku = $koneksi->query("SELECT * FROM db_buku");
    ?>