<?php

function readPetugas()
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT * FROM petugas";
    $result = $connect->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}

function readIdPetugas($id)
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT * FROM petugas WHERE id_petugas = '$id'";
    $result = $connect->query($query);

    return $result->fetch_assoc();
}
