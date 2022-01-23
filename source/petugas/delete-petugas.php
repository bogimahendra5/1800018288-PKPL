<?php

$connect = new mysqli("localhost", "root", "", "nadchan");

$id = $_GET['id'];

$queryDel = "DELETE FROM petugas WHERE id_petugas = '$id'";
$queryImg = "SELECT gambar FROM petugas WHERE id_petugas = '$id'";

$gambar = $connect->query($queryImg)->fetch_assoc();

if ($gambar['gambar'] != "user.png") {
    $namaGambar = $gambar['gambar'];
    unlink("../assets/img/petugas/$namaGambar");
    echo $gambar['gambar'];
}

$result = $connect->query($queryDel);

if ($result == TRUE) {
    session_start();
    $_SESSION['delete'] = true;
    header("Location: ../petugas.php");
} else {
    echo $connect->error;
}
