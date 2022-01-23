<?php

$connect = new mysqli("localhost", "root", "", "nadchan");

$id = $_GET['id'];

// Query delete data Buku
$queryDel = "DELETE FROM buku WHERE id = '$id'";
$queryImg = "SELECT gambar FROM buku WHERE id = '$id'";

// Query delete data pengambalian
$pengembalianDel = "DELETE FROM pengembalian WHERE id_buku = '$id'";
$connect->query($pengembalianDel);

$gambar = $connect->query($queryImg)->fetch_assoc();

if ($gambar['gambar'] != "sampul-default.png") {
    $namaGambar = $gambar['gambar'];
    echo $namaGambar;
    unlink("../assets/img/buku/$namaGambar");
}

$result = $connect->query($queryDel);
session_start();

if ($result == TRUE) {
    $_SESSION['delete'] = true;
    header("Location: ../buku.php");
} else {
    $_SESSION['deleteFalse'] = "failed";
    header("Location: ../buku.php");
}
