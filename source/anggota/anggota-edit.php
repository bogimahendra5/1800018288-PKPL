<?php

require 'read-anggota.php';

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

    <title>Anggota | Mengubah Data</title>
</head>

<body>

    <?php require '../layout.php'; ?>

    <!-- CONTENT MENGEDIT DATA ANGGOTA -->
    <section class="px-4">

        <a href="../anggota.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>

        <h4 class="fw-bold text-green my-4">Mengubah Data Anggota</h4>

        <div class="card p-4">
            <form action="update-anggota.php" method="POST" enctype="multipart/form-data">

                <div class="d-flex gap-5">

                    <!-- KOLOM KIRI, UNTUK MENGISI DATA ANGGOTA -->
                    <div class="left col-7">

                        <!-- INPUT ID -->
                        <input type="hidden" name="id" value="<?= $anggota['id']; ?>">

                        <!-- INPUT NAMA LENGKAP -->
                        <label for="nama" class="text-green fw-600 form-label">Nama Lengkap</label>
                        <input type="text" class="form-control mb-4" id="nama" placeholder="Nama anggota" value="<?= $anggota['nama']; ?>" name="nama" required>

                        <!-- INPUT ALAMAT -->
                        <label for="alamat" class="text-green fw-600 form-label">Alamat</label>
                        <input type="text" class="form-control mb-4" id="alamat" placeholder="Contoh : Jln Pramuka" name="alamat" value="<?= $anggota['alamat']; ?>" required>

                        <!-- INPUT KELAS -->
                        <label for="kelas" class="text-green fw-600 form-label">Kelas</label>
                        <input type="text" class="form-control mb-4" id="kelas" placeholder="Contoh : XI A" name="kelas" value="<?= $anggota['kelas']; ?>" required>

                        <!-- INPUT RADIO GENDER LAKI-LAKI -->
                        <p for="kelas" class="text-green fw-600 form-label">Jenis Kelamin : </p>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="Laki-Laki" <?= $anggota['jk'] == "Laki-Laki" ? "checked" : "" ?> required>
                            <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                        </div>

                        <!-- INPUT RADIO GENDER PEREMPUAN -->
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" <?= $anggota['jk'] == "Perempuan" ? "checked" : "" ?> required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>

                        <div class="d-flex justify-content-end mt-4 gap-3">
                            <a href="../anggota.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-info px-4 py-2 text-white">Update</button>
                        </div>

                    </div>

                    <!-- KOLOM KANAN, UNTUK MENGUBAH FOTO PROFIL -->
                    <div class="right col">
                        <img src="../assets/img/anggota/<?= $anggota['image']; ?>" alt="Profil Default" class="w-50 d-block mx-auto" id="profil">
                        <p class="text-center py-2 mb-1">Foto Profil</p>

                        <label for="foto" class="form-label fw-bold">
                            Ganti Foto
                            <i class="fas fa-level-down-alt fa-sm"></i>
                        </label>

                        <input class="form-control" type="file" id="input-foto" onchange="previewImg(this)" name="foto-profil">

                    </div>
                </div>

            </form>
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
                    $("#profil").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>