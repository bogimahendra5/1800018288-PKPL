<?php

include_once 'read-anggota.php';

$id = $_GET['id'];

$anggota = readUseId($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/util.css">

    <title>Detail Anggota</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once '../layout.php'; ?>

    <!-- CONTENT MENAMBAH DATA ANGGOTA -->
    <section class="px-4">

        <a href="../anggota.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>


        <div class="card p-4 mb-5">

            <h3 class="fw-bold text-green">
                Detail Anggota
                <i class="fas fa-user"></i>
            </h3>

            <div class="d-flex gap-5 mt-2">

                <!-- KOLOM KIRI, UNTUK MENAMPILKAN FOTO PROFIL -->
                <div class="left col-4">
                    <p class="my-3 fw-bold text-green ">Foto Profil : </p>
                    <img src="../assets/img/anggota/<?= $anggota['image']; ?>" alt="Profil Default" class="d-block mx-auto" width="100%">
                </div>

                <!-- KOLOM KANAN, UNTUK MENAMPILKAN DATA DIRI -->
                <div class="right col pt-5">

                    <div class="row mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">ID Anggota</span>
                        <span class="col-1 text-green d-inline-block">: </span>
                        <span class="col-4 text-green d-inline-block"><?= $anggota['id']; ?></span>
                    </div>

                    <div class="row mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Nama</span>
                        <span class="col-1 text-green d-inline-block">: </span>
                        <span class="col-4 text-green d-inline-block"><?= $anggota['nama']; ?></span>
                    </div>

                    <div class="row mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Jenis Kelamin</span>
                        <span class="col-1 text-green d-inline-block">: </span>
                        <span class="col-4 text-green d-inline-block"><?= $anggota['jk']; ?></span>
                    </div>

                    <div class="row mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Kelas</span>
                        <span class="col-1 text-green d-inline-block">: </span>
                        <span class="col-4 text-green d-inline-block"><?= $anggota['kelas']; ?></span>
                    </div>

                    <div class="row mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Alamat</span>
                        <span class="col-1 text-green d-inline-block">: </span>
                        <span class="col text-green d-inline-block text-break"><?= $anggota['alamat']; ?></span>
                    </div>
                </div>

            </div>

        </div>

    </section>

</body>

</html>