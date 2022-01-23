<?php

$idPeminjaman = $_GET['id'];

$connect = new mysqli("localhost", "root", "", "nadchan");

// MENGAMBIL DATA PEMINJAMAN BERDASARKAN ID
$queryGet = "SELECT * FROM peminjaman WHERE id = '$idPeminjaman'";
$resultGet = $connect->query($queryGet);
$data = $resultGet->fetch_assoc();

// INISIALISASI DATA UNTUK TABLE PENGEMBALIAN
$idAnggota = $data['id_anggota'];
$idBuku = $data['id_buku'];
$tglPinjam = $data['tgl_pinjam'];
$tglKembali = $data['tgl_kembali'];
$tglSetor = date('m-d-Y');

// KEMUDIAN MEMASUKAN DATA KE TABLE PENGEMBALIAN
$queryInsert = "INSERT INTO pengembalian(id_anggota, id_buku, tgl_pinjam, tgl_kembali, tgl_setor) 
                    VALUES('$idAnggota', '$idBuku', '$tglPinjam', '$tglKembali', '$tglSetor')";
$connect->query($queryInsert);

// MEMBUAT QUERY DELETE UNTUK TABLE PEMINJAMAN
$query = "DELETE FROM peminjaman WHERE id='$idPeminjaman'";
$result = $connect->query($query);

if ($result == TRUE) {
    session_start();
    $_SESSION['delete'] = true;
    header("Location: ../peminjaman.php");
} else {
    echo $connect->error;
}
