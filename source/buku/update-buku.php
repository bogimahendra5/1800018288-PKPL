<?php

// KONEKSI DATABASE
$connect = new mysqli("localhost", "root", "", "nadchan");

// INISIALISASI VARIABEL
$id = $_POST['id'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$gambarBaru = $_FILES['sampul'];



// QUERY UNTUK UPDATE nama, username, password, gender
$query = "UPDATE buku 
            SET judul = '$judul', pengarang = '$pengarang'
            WHERE id = '$id'";
$connect->query($query);

// QUERY UNTUK MENGAMBIL GAMBAR SEBELUMNYA
$queryGambar = "SELECT gambar FROM buku WHERE id = '$id'";
$gambarLama = $connect->query($queryGambar)->fetch_assoc();
$gambarLama = $gambarLama['gambar'];

// MENENTUKAN APAKAH USER MENGGANTI FOTO PROFIL YANG BARU ATAU TIDAK
if ($gambarBaru['name'] != "") {

    $extention = pathinfo($gambarBaru['name'], PATHINFO_EXTENSION);
    $namaGambar = $id . '.' . $extention;

    move_uploaded_file($gambarBaru['tmp_name'], "../assets/img/buku/$namaGambar");

    $connect->query("UPDATE buku SET gambar = '$namaGambar' WHERE id = '$id'");

    // JIKA FOTO LAMANYA ADALAH user.png MAKA JANGAN DIHAPUS
    if ($gambarLama != "sampul-default.png") {
        unlink("../assets/img/buku/$gambarLama");
    }
}

session_start();
$_SESSION['update'] = true;
header("Location: ../buku.php");
