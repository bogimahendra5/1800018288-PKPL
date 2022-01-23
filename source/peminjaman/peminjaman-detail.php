<?php

include_once 'read-peminjaman.php';

$id = $_GET['id'];

$peminjaman = getDataId($id);
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

    <title>Detail Peminjaman</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once '../layout.php'; ?>

    <!-- CONTENT MENAMBAH DATA PEMINJAMAN -->
    <section class="px-4">

        <a href="../peminjaman.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>


        <div class="row">
            <div class="card col-7 p-4 mb-5">

                <h3 class="fw-bold text-green pb-3 border-bottom">Detail Peminjaman
                    <i class="fas fa-book fa-sm me-1"></i>
                </h3>

                <div class="mb-3 mt-2">
                    <span class="fw-bold text-green col-3 d-inline-block">ID Anggota</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $peminjaman['id']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Nama</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $peminjaman['nama']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Kelas</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $peminjaman['kelas']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Buku</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $peminjaman['judul']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Tanggal Pinjam</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $peminjaman['tgl_pinjam']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Tanggal Kembali</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block"><?= $peminjaman['tgl_kembali']; ?></span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Status</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block">
                        <span class="badge bg-secondary">Pinjam</span>
                    </span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Keterangan</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="text-green col d-inline-block">
                        <?php if (terlambat($id, "%R") > 0) : ?>

                            <strong class="fs-14 text-danger mb-0">
                                Terlambat <?= terlambat($id, "%R"); ?> hari
                            </strong>

                        <?php else : ?>

                            <p class="mb-0">Masa peminjaman sisa<strong> <?= terlambat($id, ""); ?> hari </strong></p>

                        <?php endif; ?>
                    </span>
                </div>

                <div class="mb-3">
                    <span class="fw-bold text-green col-3 d-inline-block">Denda</span>
                    <span class="text-green col-1 d-inline-block">: </span>
                    <span class="col d-inline-block">
                        <?php if (terlambat($id, "%R") > 0) : ?>

                            <strong class="fs-14 text-danger mb-0">
                                Rp. <?php $denda = (int)terlambat($id, "%R") * 1000;
                                    echo number_format($denda);
                                    ?>
                            </strong>

                        <?php else : ?>

                            <p class="text-green">0</p>

                        <?php endif; ?>
                    </span>
                </div>

            </div>
        </div>

    </section>

</body>

</html>