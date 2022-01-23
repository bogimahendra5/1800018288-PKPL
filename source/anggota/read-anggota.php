<?php

function readAnggota()
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT * FROM anggota";
    $result = $connect->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}

function readUseId($id)
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT * FROM anggota WHERE id = $id";
    $result = $connect->query($query);

    return $result->fetch_assoc();
}

function countGender()
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $queryL = "SELECT COUNT(jk) FROM anggota WHERE jk = 'Laki-Laki'";
    $queryP = "SELECT COUNT(jk) FROM anggota WHERE jk = 'Perempuan'";
    $queryAll = "SELECT COUNT(jk) FROM anggota";

    $male = $connect->query($queryL);
    $female = $connect->query($queryP);
    $all = $connect->query($queryAll);

    $countGender = array(
        "L" => $male->fetch_assoc()['COUNT(jk)'],
        "P" => $female->fetch_assoc()['COUNT(jk)'],
        "all" => $all->fetch_assoc()['COUNT(jk)'],
    );

    return $countGender;
}
