<?php

function createPinjam($idAnggota, $idBuku, $tglPinjam, $tglKembali)
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "INSERT INTO peminjaman(id_anggota, id_buku, tgl_pinjam, tgl_kembali) 
                VALUES('$idAnggota', '$idBuku', '$tglPinjam', '$tglKembali')";

    $result = $connect->query($query);

    session_start();
    if ($result == TRUE) {
        $_SESSION['create'] = true;
        header("Location: ../peminjaman.php");
    } else {
        $_SESSION['createFail'] = "fail";
        header("Location: ../peminjaman.php");
    }
}

$idAnggota = explode(" ", $_POST['anggota']);
$idAnggota = $idAnggota[0];

$idBuku = explode(" ", $_POST['buku']);
$idBuku = $idBuku[0];

$tglPinjam = $_POST['pinjam'];
$tglKembali = $_POST['kembali'];

createPinjam($idAnggota, $idBuku, $tglPinjam, $tglKembali);
