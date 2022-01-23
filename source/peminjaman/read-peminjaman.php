<?php

// FUNCTION UNTUK MENGAMBIL SEMUA DATA DI TABLE PEMINJAMAN
function readPeminjaman()
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT peminjaman.id, nama, judul, tgl_pinjam, tgl_kembali, denda FROM peminjaman INNER JOIN anggota ON peminjaman.id_anggota = anggota.id INNER JOIN buku ON peminjaman.id_buku = buku.id;";
    $result = $connect->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}

// FUNCTION UNTUK MENGAMBIL DATA BERDASARKAN ID PEMINJAMAN
function getDataId($id)
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT anggota.id, anggota.nama, anggota.kelas, buku.judul, peminjaman.tgl_pinjam, peminjaman.tgl_kembali 
                FROM peminjaman 
                INNER JOIN anggota ON anggota.id = peminjaman.id_anggota 
                INNER JOIN buku ON buku.id = peminjaman.id_buku WHERE peminjaman.id = $id";

    $result = $connect->query($query);
    return $result->fetch_assoc();
}

// FUNCTION UNTUK MENGAMBIL DATA ID, NAMA DI TABLE ANGGOTA
function getIdNameAnggota()
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT id, nama FROM anggota";
    $result = $connect->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}

// FUNCTION UNTUK MENGAMBIL DATA ID, NAMA DI TABLE BUKU
function getIdNameBuku()
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT id, judul FROM buku";
    $result = $connect->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}

// FUNCTION UNTUK MENGHITUNG KETERLAMBATAN PENGEMBALIAN BUKU
function terlambat($id, $format)
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT tgl_kembali FROM peminjaman WHERE id = '$id'";
    $result = $connect->query($query);

    $tglKembali = date_create($result->fetch_assoc()['tgl_kembali']);
    $tglSkrg = date_create(date('d-m-Y'));

    $diff = date_diff($tglKembali, $tglSkrg);

    return (int)$diff->format("$format%a");
}
