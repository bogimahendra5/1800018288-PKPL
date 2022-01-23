<?php

function addData($nama, $alamat, $kelas, $gender, $gambar)
{

    $connect = new mysqli("localhost", "root", "", "nadchan");

    // MENCARI ID TERTINGGI 
    $maxId = $connect->query("SELECT MAX(id) FROM anggota");
    $result = 0;
    $result = $maxId->fetch_array()["MAX(id)"];
    $getId = 0;

    // JIKA TIDAK ADA ID TERTINGGI MAKA ID BARU AKAN DIBUAT. ID BARU DIMULAI DARI 1000
    if (isset($result)) {
        $getId = intval($result) + 1;
    } else {
        $getId = 1000;
    }

    // MENGECEK APAKAH USER MENGINPUTKAN GAMBAR ATAU TIDAK
    if ($gambar['name'] != "") {

        // MENGAMBIL EXTENSI
        $extention = pathinfo($gambar['name'], PATHINFO_EXTENSION);
        $namaGambar = $getId . '.' . $extention;

        move_uploaded_file($gambar['tmp_name'], "../assets/img/anggota/$namaGambar");
        $query = "INSERT INTO anggota(id, nama, alamat, jk, kelas, image) 
                VALUES('$getId', '$nama', '$alamat', '$gender', '$kelas', '$namaGambar')";
    } else {
        $query = "INSERT INTO anggota(id, nama, alamat, jk, kelas) 
        VALUES('$getId', '$nama', '$alamat', '$gender', '$kelas')";
    }

    $result = $connect->query($query);
    if ($result == TRUE) {
        session_start();
        $_SESSION['create'] = true;
        header("Location: ../anggota.php");
    } else {
        echo $connect->error;
    }
}

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];
$kelas = $_POST['kelas'];
$gambar = $_FILES['foto-profil'];

addData($nama, $alamat, $kelas, $gender, $gambar);

// $connect = new mysqli("localhost", "root", "", "nadchan");

// // MENCARI ID TERTINGGI 
// $maxId = $connect->query("SELECT MAX(id) FROM anggota");
// $result = 0;
// $result = $maxId->fetch_array()["MAX(id)"];
// $getId = 0;

// // JIKA TIDAK ADA ID TERTINGGI MAKA ID BARU AKAN DIBUAT. ID BARU DIMULAI DARI 1000
// if (isset($result)) {
//     $getId = intval($result) + 1;
// } else {
//     $getId = 1000;
// }
