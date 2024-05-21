<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
<body>
    <div class="nav">
        <a href="data_buku.php">Data Buku</a>
    </div>

    <?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        # code...
        header("Location: login.php");
    }
    ?>
        <div class="Home" id="#Home">
        <h1>Ini Home</h1>
        Hallo,<?php echo $_SESSION['user']['username'];?>
    </div>
    <div class="content">
        <h1>Ini Halaman Data Buku</h1>
        <?php
            include_once "koneksi.php";
            $data_buku = $koneksi->query(
                "SELECT * FROM db_buku"
            );
        ?>
        <br>
        <a href="form_data_buku.php">Tambah Data Buku</a>

        <table style="width: 100%;" border="1">
            <tr>
                <th>ID</th>
                <th>Nama Buku</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
        <?php
            foreach ($data_buku as $item) {
                
        ?>

            <tr>
                <td><?php echo $item['id'] ?></td>
                <td><?php echo $item['nama_buku'] ?></td>
                <td><?php echo $item['tahun_terbit'] ?></td>
                <td><?php echo $item['stock'] ?></td>
                <td>
                    <a href="edit_buku.php?id=<?php echo $item['id'] ?>"><button>Edit</button></a>
                    <a href="handler_buku.php?delete_id=<?php echo $item['id'] ?>"><button>Delete</button></a>
                    
                </td>
            </tr>

        <?php
            }
        ?>
        </table>
    </div>
</body>
</html>