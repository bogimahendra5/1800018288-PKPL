<?php

$connect = new mysqli("localhost", "root", "", "nadchan");

$id = $_GET['id'];

// Query delete data Pengembalian
$queryDel = "DELETE FROM pengembalian WHERE id = '$id'";
$result = $connect->query($queryDel);
session_start();

if ($result == TRUE) {
    $_SESSION['delete'] = true;
    header("Location: ../pengembalian.php");
} else {
    $_SESSION['deleteFalse'] = "failed";
    header("Location: ../pengembalian.php");
}
