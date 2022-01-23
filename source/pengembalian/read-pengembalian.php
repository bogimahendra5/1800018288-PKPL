<?php

// FUNCTION UNTUK MENGAMBIL SEMUA DATA DI TABLE PENGEMBALIAN
function readPengembalian()
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT pengembalian.id, nama, judul, tgl_pinjam, tgl_kembali FROM pengembalian INNER JOIN anggota ON pengembalian.id_anggota = anggota.id INNER JOIN buku ON pengembalian.id_buku = buku.id;";
    $result = $connect->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}

// FUNCTION UNTUK MENGAMBIL DATA BERDASARKAN ID PENGEMBALIAN
function getDataId($id)
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT anggota.id, anggota.nama, anggota.kelas, buku.judul, pengembalian.tgl_pinjam, pengembalian.tgl_kembali, pengembalian.tgl_setor 
                FROM pengembalian 
                INNER JOIN anggota ON anggota.id = pengembalian.id_anggota 
                INNER JOIN buku ON buku.id = pengembalian.id_buku WHERE pengembalian.id = $id";

    $result = $connect->query($query);
    return $result->fetch_assoc();
}
