<?php

// KONEKSI DATABASE
$connect = new mysqli("localhost", "root", "", "nadchan");

// INISIALISASI VARIABEL
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$gender = $_POST['gender'];
$gambarBaru = $_FILES['foto-profil'];



// QUERY UNTUK UPDATE nama, username, password, gender
$query = "UPDATE petugas 
            SET nama = '$nama', username = '$username', password = '$password' , gender = '$gender'
            WHERE id_petugas = '$id'";
$connect->query($query);

// QUERY UNTUK MENGAMBIL GAMBAR SEBELUMNYA
$queryGambar = "SELECT gambar FROM petugas WHERE id_petugas = '$id'";
$gambarLama = $connect->query($queryGambar)->fetch_assoc();
$gambarLama = $gambarLama['gambar'];

// MENENTUKAN APAKAH USER MENGGANTI FOTO PROFIL YANG BARU ATAU TIDAK
if ($gambarBaru['name'] != "") {

    $extention = pathinfo($gambarBaru['name'], PATHINFO_EXTENSION);
    $namaGambar = $id . '.' . $extention;

    move_uploaded_file($gambarBaru['tmp_name'], "../assets/img/petugas/$namaGambar");

    $connect->query("UPDATE petugas SET gambar = '$namaGambar' WHERE id_petugas = '$id'");

    // JIKA FOTO LAMANYA ADALAH user.png MAKA JANGAN DIHAPUS
    if ($gambarLama != "user.png") {
        unlink("../assets/img/petugas/$gambarLama");
    }
}

session_start();
$_SESSION['update'] = true;
header("Location: ../petugas.php");
