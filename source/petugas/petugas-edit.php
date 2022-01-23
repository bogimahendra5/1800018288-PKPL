<?php

include_once 'read-petugas.php';

$id = $_GET['id'];

$petugas1 = readIdPetugas($id);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/util.css">

    <title>Petugas | Mengubah Data</title>
</head>

<body>

    <?php include_once '../layout.php'; ?>

    <!-- CONTENT MENGEDIT DATA PETUGAS -->
    <section class="px-4">

        <a href="../petugas.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>

        <h4 class="fw-bold text-green my-4">
            Mengubah Data Petugas
            <i class="fas fa-user-circle"></i>
        </h4>

        <div class="card p-4">
            <form action="update-petugas.php" method="POST" enctype="multipart/form-data">

                <div class="d-flex gap-5">

                    <!-- KOLOM KIRI, UNTUK MENGISI DATA PETUGAS -->
                    <div class="left col-7">

                        <!-- INPUT ID -->
                        <input type="hidden" name="id" value="<?= $petugas1['id_petugas']; ?>">

                        <!-- INPUT NAMA LENGKAP -->
                        <label for="nama" class="text-green fw-600 form-label">Nama Petugas</label>
                        <input type="text" class="form-control mb-4" id="nama" value="<?= $petugas1['nama']; ?>" name="nama" required>

                        <!-- INPUT USERNAME -->
                        <label for="username" class="text-green fw-600 form-label">Username</label>
                        <input type="text" class="form-control mb-4" id="username" name="username" value="<?= $petugas1['username']; ?>" required>

                        <!-- PASSWORD -->
                        <label for="password" class="text-green fw-600 form-label">Konfirmasi Password</label>
                        <input type="text" class="form-control mb-4" id="password" name="password" value="" required>

                        <!-- INPUT LEVEL PETUGAS -->
                        <label for="level" class="text-green fw-600 form-label">Level</label>
                        <!-- <input class="form-control mb-4" type="text" value="Petugas" aria-label="Disabled input example" name="levell" disabled> -->
                        <select class="form-select mb-4" aria-label="Default select example" name="levell">
                            <?php if ($petugas1['level'] == "Administrator") : ?>
                                <option value="Administrator">Administrator</option>
                                <option value="Petugas">Petugas</option>
                            <?php else : ?>
                                <option value="Petugas">Petugas</option>
                                <option value="Administrator">Administrator</option>
                            <?php endif; ?>
                        </select>

                        <!-- INPUT RADIO GENDER LAKI-LAKI -->
                        <p for="kelas" class="text-green fw-600 form-label">Jenis Kelamin : </p>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="Laki-Laki" <?= $petugas1['gender'] == "Laki-Laki" || $petugas['gender'] == "L" ? "checked" : "" ?> required>
                            <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                        </div>

                        <!-- INPUT RADIO GENDER PEREMPUAN -->
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" <?= $petugas1['gender'] == "Perempuan" || $petugas['gender'] == "P" ? "checked" : "" ?> required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>

                        <div class="d-flex justify-content-end mt-4 gap-3">
                            <a href="../petugas.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-info px-4 py-2 text-white">Update</button>
                        </div>

                    </div>

                    <!-- KOLOM KANAN, UNTUK MENGUBAH FOTO PROFIL -->
                    <div class="right col">
                        <img src="../assets/img/petugas/<?= $petugas1['gambar']; ?>" alt="Profil Default" class="w-50 d-block mx-auto mt-4" id="profil">
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