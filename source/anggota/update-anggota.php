<?php

// KONEKSI DATABASE
$connect = new mysqli("localhost", "root", "", "nadchan");

// INISIALISASI VARIABEL
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$gender = $_POST['gender'];
$gambarBaru = $_FILES['foto-profil'];



// QUERY UNTUK UPDATE nama, alamat, gender, kelas
$query = "UPDATE anggota 
            SET nama = '$nama', alamat = '$alamat', jk = '$gender', kelas = '$kelas' 
            WHERE id = '$id'";
$connect->query($query);

// QUERY UNTUK MENGAMBIL GAMBAR SEBELUMNYA
$queryGambar = "SELECT image FROM anggota WHERE id = $id";
$gambarLama = $connect->query($queryGambar)->fetch_assoc();
$gambarLama = $gambarLama['image'];

// MENENTUKAN APAKAH USER MENGGANTI FOTO PROFIL YANG BARU ATAU TIDAK
if ($gambarBaru['name'] != "") {

    $extention = pathinfo($gambarBaru['name'], PATHINFO_EXTENSION);
    $namaGambar = $id . '.' . $extention;

    move_uploaded_file($gambarBaru['tmp_name'], "../assets/img/anggota/$namaGambar");

    $connect->query("UPDATE anggota SET image = '$namaGambar' WHERE id = '$id'");

    // JIKA FOTO LAMANYA ADALAH user.png MAKA JANGAN DIHAPUS
    if ($gambarLama != "user.png") {
        unlink("../assets/img/anggota/$gambarLama");
    }
}

session_start();
$_SESSION['update'] = true;
header("Location: ../anggota.php");
