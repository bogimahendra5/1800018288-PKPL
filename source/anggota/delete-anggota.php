<?php

$connect = new mysqli("localhost", "root", "", "nadchan");

$id = $_GET['id'];

// Query delete data Anggota dan gambar
$queryDel = "DELETE FROM anggota WHERE id = '$id'";
$queryImg = "SELECT image FROM anggota WHERE id = '$id'";

// Query delete data pengambalian
$pengembalianDel = "DELETE FROM pengembalian WHERE id_anggota = '$id'";
$connect->query($pengembalianDel);

$gambar = $connect->query($queryImg)->fetch_assoc();

if ($gambar['image'] != "user.png") {
    $namaGambar = $gambar['image'];
    unlink("../assets/img/anggota/$namaGambar");
    echo $gambar['image'];
}
session_start();

$result = $connect->query($queryDel);
if ($result == TRUE) {
    $_SESSION['delete'] = "success";
    header("Location: ../anggota.php");
} else {
    $_SESSION['deleteFalse'] = "failed";
    header("Location: ../anggota.php");
}
