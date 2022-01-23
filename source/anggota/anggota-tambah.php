<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/util.css">
    <link rel="stylesheet" href="../assets/css/anggota.css">

    <title>Anggota | Tambah Data</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php require '../layout.php'; ?>

    <!-- CONTENT MENAMBAH DATA ANGGOTA -->
    <section class="px-4 pt-4">

        <a href="../anggota.php" class="text-secondary mb-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>

        <h4 class="fw-bold mb-4 text-green">
            Menambah Data Anggota
            <i class="fas fa-user-friends fa-sm"></i>
        </h4>

        <div class="card p-4">
            <form action="create-anggota.php" method="POST" enctype="multipart/form-data">

                <div class="d-flex gap-5">

                    <div class="left col-7">
                        <!-- INPUT NAMA LENGKAP -->
                        <label for="nama" class="text-green fw-600 form-label">Nama Lengkap</label>
                        <input type="text" class="form-control mb-4" id="nama" placeholder="Nama anggota" name="nama" required>

                        <!-- INPUT ALAMAT -->
                        <label for="alamat" class="text-green fw-600 form-label">Alamat</label>
                        <input type="text" class="form-control mb-4" id="alamat" placeholder="Contoh : Jln Pramuka" name="alamat" required>

                        <label for="kelas" class="text-green fw-600 form-label">Kelas</label>
                        <input type="text" class="form-control mb-4" id="kelas" placeholder="Contoh : XI A" name="kelas" required>

                        <!-- INPUT RADIO GENDER LAKI-LAKI -->
                        <p for="kelas" class="text-green fw-600 form-label">Jenis Kelamin : </p>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="Laki-Laki" required>
                            <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                        </div>

                        <!-- INPUT RADIO GENDER PEREMPUAN -->
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>

                        <div class="d-flex justify-content-end mt-4 gap-3">
                            <a href="../anggota.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4 py-2 text-white">Tambah</button>
                        </div>

                    </div>

                    <!-- KOLOM KANAN, UNTUK MENGUBAH FOTO PROFIL -->
                    <div class="right col">
                        <img src="../assets/img/anggota/user.png" alt="Profil Default" class="w-50 d-block mx-auto" id="profil">
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