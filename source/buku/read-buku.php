<?php
function readBuku()
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT * FROM buku";
    $result = $connect->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}

function readUseId($id)
{
    $connect = new mysqli("localhost", "root", "", "nadchan");
    $query = "SELECT * FROM buku WHERE id = '$id'";
    $result = $connect->query($query);

    return $result->fetch_assoc();
}
