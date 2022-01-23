<?php

include_once 'read-buku.php';

$id = $_GET['id'];

$buku = readUseId($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/util.css">

    <title>Detail Buku</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once '../layout.php'; ?>

    <!-- CONTENT MENAMBAH DATA BUKU -->
    <section class="px-4">

        <a href="../buku.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>


        <div class="card p-4 mb-5">

            <h3 class="fw-bold text-green">Detail Buku
                <i class="fas fa-book fa-sm me-1"></i>
            </h3>

            <div class="d-flex gap-5 mt-2">

                <!-- KOLOM KIRI, UNTUK MENAMPILKAN FOTO PROFIL -->
                <div class="left col-4">
                    <p class="my-3 fw-bold text-green">Foto Profil : </p>
                    <img src="../assets/img/buku/<?= $buku['gambar']; ?>" alt="Profil Default" class="d-block mx-auto" width="100%">
                </div>

                <!-- KOLOM KANAN, UNTUK MENAMPILKAN DATA BUKU -->
                <div class="right col-5 pt-5">

                    <div class="mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">ID buku</span>
                        <span class="text-green col-1 d-inline-block">: </span>
                        <span class="text-green col-4 d-inline-block"><?= $buku['id']; ?></span>
                    </div>

                    <div class="mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Nama</span>
                        <span class="text-green col-1 d-inline-block">: </span>
                        <span class="text-green col-4 d-inline-block"><?= $buku['judul']; ?></span>
                    </div>

                    <div class="mb-3">
                        <span class="fw-bold text-green col-3 d-inline-block">Pengarang</span>
                        <span class="text-green col-1 d-inline-block">: </span>
                        <span class="text-green col-4 d-inline-block"><?= $buku['pengarang']; ?></span>
                    </div>

                    <!-- <div class="mb-3">
                        <span class="fw-bold col-3 d-inline-block">Stok</span>
                        <span class="col-1 d-inline-block">: </span>
                        <span class="col-4 d-inline-block">40</span>
                    </div> -->

                </div>
            </div>
        </div>

    </section>

</body>

</html>