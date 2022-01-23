<?php

include_once 'read-petugas.php';

$id = $_GET['id'];

$petugasDetail = readIdPetugas($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/util.css">

    <title>Detail Petugas</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once '../layout.php'; ?>

    <!-- CONTENT MENAMBAH DATA PETUGAS -->
    <section class="px-4">

        <a href="../petugas.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>


        <div class="card p-4 mb-5">

            <h3 class="fw-bold text-green">Detail Petugas
                <i class="fas fa-user-circle me-1"></i>
            </h3>

            <div class="d-flex gap-5 mt-2">

                <!-- KOLOM KIRI, UNTUK MENAMPILKAN FOTO PROFIL -->
                <div class="left col-4">
                    <p class="my-3 fw-bold text-green">Foto Profil : </p>
                    <img src="../assets/img/petugas/<?= $petugasDetail['gambar']; ?>" alt="Profil Default" class="d-block mx-auto" width="100%">
                </div>

                <!-- KOLOM KANAN, UNTUK MENAMPILKAN DATA DIRI -->
                <div class="right col pt-5">

                    <!-- MENAMPILKAN ID PETUGAS -->
                    <div class="mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">ID Petugas</span>
                        <span class="text-green col-1 d-inline-block">: </span>
                        <span class="text-green col-4 d-inline-block"><?= $petugasDetail['id_petugas']; ?></span>
                    </div>

                    <!-- MENAMPILKAN NAMA PETUGAS -->
                    <div class="mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Nama</span>
                        <span class="text-green col-1 d-inline-block">: </span>
                        <span class="text-green col d-inline-block"><?= $petugasDetail['nama']; ?></span>
                    </div>

                    <!-- MENAMPILKAN GENDER PETUGAS -->
                    <div class="mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Jenis Kelamin</span>
                        <span class="text-green col-1 d-inline-block">: </span>
                        <span class="text-green col-4 d-inline-block"><?= $petugasDetail['gender']; ?></span>
                    </div>

                    <!-- MENAMPILKAN USERNAME PETUGAS -->
                    <div class="mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Username</span>
                        <span class="text-green col-1 d-inline-block">: </span>
                        <span class="text-green col-4 d-inline-block"><?= $petugasDetail['username']; ?></span>
                    </div>

                    <!-- MENAMPILKAN PASSWORD PETUGAS -->
                    <div class="row mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Password</span>
                        <span class="text-green col-1 d-inline-block">: </span>
                        <span class="text-green text-break col d-inline-block"><?= $petugasDetail['password']; ?></span>
                    </div>

                    <!-- MENAMPILKAN LEVEL PETUGAS -->
                    <div class="mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Level</span>
                        <span class="text-green col-1 d-inline-block">: </span>
                        <span class="badge bg-green text-white col d-inline-block"><?= $petugasDetail['level']; ?></span>
                    </div>

                </div>

            </div>

        </div>

    </section>

</body>

</html>