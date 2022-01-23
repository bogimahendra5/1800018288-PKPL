<?php

function addData($nama, $username, $password, $gender, $level, $gambar)
{

    $connect = new mysqli("localhost", "root", "", "nadchan");

    // MENCARI ID TERTINGGI 
    $maxId = $connect->query("SELECT MAX(id_petugas) FROM petugas");
    $getId = 0;

    // JIKA TIDAK ADA ID TERTINGGI MAKA ID BARU AKAN DIBUAT. ID BARU DIMULAI DARI 1000
    if ($maxId->num_rows != 0) {
        $getId = $maxId->fetch_array()[0] + 1;
    } else {
        $getId = 100;
    }

    // MENGECEK APAKAH USER MENGINPUTKAN GAMBAR ATAU TIDAK
    if ($gambar['name'] != "") {

        // MENGAMBIL EXTENSI
        $extention = pathinfo($gambar['name'], PATHINFO_EXTENSION);
        $namaGambar = $getId . '.' . $extention;

        move_uploaded_file($gambar['tmp_name'], "../assets/img/petugas/$namaGambar");
        $query = "INSERT INTO petugas(id_petugas, nama, username, password, gender, level, gambar) 
                VALUES('$getId', '$nama', '$username', '$password', '$gender', '$level', '$namaGambar')";
    } else {
        $query = "INSERT INTO petugas(id_petugas, nama, username, password, gender, level) 
        VALUES('$getId', '$nama', '$username', '$password', '$gender', '$level')";
    }

    session_start();
    $result = $connect->query($query);
    if ($result == TRUE) {
        $_SESSION['create'] = true;
        header("Location: ../petugas.php");
    } else {
        $_SESSION['createFail'] = "fail";
        header("Location: ../petugas/petugas-tambah.php");
    }
}

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$gender = $_POST['gender'];
$level = $_POST['levell'];
$gambar = $_FILES['foto-profil'];

addData($nama, $username, $password, $gender, $level, $gambar);
