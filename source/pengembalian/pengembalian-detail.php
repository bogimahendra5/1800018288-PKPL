<?php

include_once 'read-pengembalian.php';

$id = $_GET['id'];

$pengembalian = getDataId($id);
// var_dump($peminjaman);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/util.css">

    <title>Detail Pengembalian</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once '../layout.php'; ?>

    <!-- CONTENT MENAMBAH DATA PENGEMBALIAN -->
    <section class="px-4">

        <a href="../pengembalian.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>


        <div class="row">
            <div class="card col-7 p-4 mb-5">

                <h3 class="fw-bold text-green pb-3 border-bottom">Detail Pengembalian
                    <i class="fas fa-book fa-sm me-1"></i>
                </h3>

                <div class="mb-3 mt-2">
                    <span class="fw-bold text-green col-3 d-inline-block">ID Anggota</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $pengembalian['id']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Nama</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $pengembalian['nama']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Kelas</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $pengembalian['kelas']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Buku</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $pengembalian['judul']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Tanggal Pinjam</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block">
                        <?= $pengembalian['tgl_pinjam']; ?>
                        <span class="mx-2 fw-bold fst-italic">s.d.</span>
                        <?= $pengembalian['tgl_kembali']; ?>
                    </span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Diserahkan tanggal</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $pengembalian['tgl_setor']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Status</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="col d-inline-block">
                        <span class="badge bg-success"><i class="fas fa-check fa-sm me-1"></i>Diterima</span>
                    </span>
                </div>

            </div>
        </div>

    </section>

</body>

</html>