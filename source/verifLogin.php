<?php

$connect = new mysqli("localhost", "root", "", "nadchan");

$username = $_POST['username'];
$password = $_POST['password'];

$querySelect = "SELECT id_petugas, nama, username, password, level, gambar FROM petugas";
$result = $connect->query($querySelect);

session_start();
foreach ($result as $petugas) {
    if ($petugas['username'] == $username) {
        if (password_verify($password, $petugas['password'])) {
            $_SESSION['id'] = $petugas['id_petugas'];
            $_SESSION['login'] = true;
            header("Location: dashboard.php");
            break;
        }
    } else {
        $_SESSION['loginFail'] = "fail";
        header("Location: index.php");
    }
}
