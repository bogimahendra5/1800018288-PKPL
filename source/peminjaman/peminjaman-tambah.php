<?php

require 'read-peminjaman.php';

$tglSaatIni = date('d-m-Y');
$anggota = getIdNameAnggota();
$buku = getIdNameBuku();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/util.css">

    <title>Peminjaman | Tambah Data</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php require '../layout.php'; ?>

    <!-- CONTENT MENAMBAH DATA PEMINJAMAN -->
    <section class="px-4">

        <a href="../peminjaman.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>

        <h4 class="text-green fw-bold my-4">
            Menambah Data Peminjaman <i class="fas fa-book-open fa-sm"></i>
        </h4>

        <div class="row">
            <div class="card col-7 p-4">
                <form action="create-peminjaman.php" method="POST" enctype="multipart/form-data">

                    <!-- INPUT PETUGAS -->
                    <input type="hidden" name="petugas" value="104">

                    <!-- INPUT ID ANGGOTA -->
                    <label for="anggota" class="text-green fw-600 form-label">ID Anggota</label>
                    <select type="text" class="form-control mb-4 select" id="anggota" placeholder="Cari id anggota..." name="anggota" required>
                        <option selected>Pilih</option>
                        <?php foreach ($anggota as $g) : ?>
                            <option value="<?= $g['id']; ?> <?= $g['nama']; ?>"><?= $g['id']; ?> - <?= $g['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <!-- INPUT ID BUKU -->
                    <label for="buku" class="text-green fw-600 form-label">ID Buku</label>
                    <select type="text" class="form-control mb-4" id="buku" placeholder="Cari id buku..." name="buku" required>
                        <option selected>Pilih</option>
                        <?php foreach ($buku as $b) : ?>
                            <option value="<?= $b['id']; ?> <?= $b['judul']; ?>"><?= $b['id']; ?> - <?= $b['judul']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <!-- INPUT TANGGAL PEMINJAMAN & KEMBALI -->
                    <div class="row justify-content-start">

                        <!-- TANGGAL PINJAM -->
                        <div class="col-4">
                            <label for="pinjam" class="text-green fw-600 form-label">Tanggal Pinjam</label>
                            <input type="text" class="form-control" id="pinjam" value="<?= $tglSaatIni; ?>" name="pinjam" readonly>
                        </div>

                        <!-- TANGGAL KEMBALI -->
                        <div class="col-4">
                            <label for="kembali" class="text-green fw-600 form-label">Tanggal Kembali</label>
                            <input type="text" class="form-control" id="kembali" value="<?= date('d-m-Y', strtotime($tglSaatIni . '+ 7 days')); ?>" name="kembali" readonly>
                        </div>

                    </div>
                    <p class="text-secondary fst-italic fs-12 mt-2">*Durasi peminjaman buku 7 hari</p>

                    <!-- BUTTON -->
                    <div class="d-flex justify-content-end mt-4 gap-3">
                        <a href="../buku.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 py-2 text-white">Tambah</button>
                    </div>

                </form>
            </div>
        </div>

    </section>

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script>
        function previewImg(event) {

            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#sampul").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>