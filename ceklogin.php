<?php
// mengaktifkan session pada php
session_start();
// mengubungkan php dengan koneksi database
include 'koneksi.php';
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_num_rows($con, "select * from user where username= '$username' and password='$password ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){
    $data = mysqli_fetch_assoc($login);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location:../index.html");
    }else{
    // alihkan ke halaman login kembali
    header("location:index.php?alert=gagal");
    }
?>