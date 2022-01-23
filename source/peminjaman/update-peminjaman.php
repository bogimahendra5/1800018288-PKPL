<?php
$id = $_GET['id'];

$connect = new mysqli("localhost", "root", "", "nadchan");

$query = "SELECT tgl_kembali FROM peminjaman WHERE id = '$id'";

$result = $connect->query($query);

$getData = $result->fetch_assoc()['tgl_kembali'];
$tglKembali = date('d-m-Y', strtotime($getData . '+ 7 days'));

$queryUpdate = "UPDATE peminjaman SET tgl_kembali = '$tglKembali' WHERE id = '$id'";

$result = $connect->query($queryUpdate);

if ($result == TRUE) {
    session_start();
    $_SESSION['update'] = true;
    header("Location: ../peminjaman.php");
} else {
    echo $connect->error;
}
