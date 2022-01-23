<?php

function addData($judul, $pengarang, $gambar)
{

    $connect = new mysqli("localhost", "root", "", "nadchan");

    // MENCARI ID TERTINGGI 
    $maxId = $connect->query("SELECT MAX(id) FROM buku");
    $result = 0;
    $result = $maxId->fetch_array()["MAX(id)"];
    $getId = 0;

    // JIKA TIDAK ADA ID TERTINGGI MAKA ID BARU AKAN DIBUAT. ID BARU DIMULAI DARI 1000
    if (!is_null($result)) {
        $getInt = explode("BK", $result);
        $getId = (int)$getInt[1] + 1;
        $getId = strval("BK$getId");
    } else {
        $getId = 'BK1001';
    }

    // MENGECEK APAKAH USER MENGINPUTKAN GAMBAR ATAU TIDAK
    if ($gambar['name'] != "") {

        // MENGAMBIL EXTENSI
        $extention = pathinfo($gambar['name'], PATHINFO_EXTENSION);
        $namaGambar = $getId . '.' . $extention;

        move_uploaded_file($gambar['tmp_name'], "../assets/img/buku/$namaGambar");
        $query = "INSERT INTO buku(id, judul, pengarang, gambar) 
                    VALUES('$getId', '$judul', '$pengarang', '$namaGambar')";
    } else {
        $query = "INSERT INTO buku(id, judul, pengarang) 
            VALUES('$getId', '$judul', '$pengarang')";
    }

    $result = $connect->query($query);

    if ($result == TRUE) {
        session_start();
        $_SESSION['create'] = true;
        header("Location: ../buku.php");
    } else {
        echo $connect->error;
    }
}

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$gambar = $_FILES['sampul'];

addData($judul, $pengarang, $gambar);


// $connect = new mysqli("localhost", "root", "", "nadchan");

// // MENCARI ID TERTINGGI 
// $maxId = $connect->query("SELECT MAX(id) FROM buku");
// $result = 0;
// $result = $maxId->fetch_array()["MAX(id)"];
// $getId = 0;

// // JIKA TIDAK ADA ID TERTINGGI MAKA ID BARU AKAN DIBUAT. ID BARU DIMULAI DARI 1000
// if (!is_null($result)) {
//     $getInt = explode("BK", $result);
//     $getId = (int)$getInt[1] + 1;
//     $getId = strval("BK$getId");
// }
