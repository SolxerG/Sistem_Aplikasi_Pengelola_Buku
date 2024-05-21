<?php 
include_once "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$user = $koneksi->query("SELECT * FROM db_user where username = '$username' AND password = '$password'");

$check_login = $user->fetch_array();

if($check_login[0]) {
    session_start();
    $_SESSION['user'] = $check_login;

    header("Location: data_buku.php");
}else {
    echo "User Tidak Terdaftar";
    header("Location: login.php");
}
?>