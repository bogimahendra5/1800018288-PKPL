<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/util.css">

    <title>Petugas | Tambah Data</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once '../layout.php'; ?>

    <!-- CONTENT MENAMBAH DATA PETUGAS -->
    <section class="px-4">

        <a href="../petugas.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>

        <h4 class="fw-bold text-green my-4">
            Menambah Data Petugas
            <i class="fas fa-user-circle"></i>
        </h4>

        <div class="card p-4">
            <form action="create-petugas.php" method="POST" enctype="multipart/form-data">

                <div class="d-flex gap-5">

                    <div class="left col-7">
                        <!-- INPUT NAMA PETUGAS -->
                        <label for="nama" class="text-green fw-600 form-label">Nama Petugas</label>
                        <input type="text" class="form-control mb-4" id="nama" placeholder="Nama Lengkap" name="nama" required>

                        <!-- INPUT USERNAME -->
                        <label for="username" class="text-green fw-600 form-label">Username</label>
                        <input type="text" class="form-control mb-4" id="username" placeholder="Tidak boleh ada spasi!" name="username" required>

                        <!-- INPUT PASSWORD -->
                        <label for="password" class="text-green fw-600 form-label">Password</label>
                        <input type="password" class="form-control mb-4" id="password" placeholder="Minimal 5 karakter" name="password" required>

                        <!-- INPUT LEVEL PETUGAS -->
                        <label for="level" class="text-green fw-600 form-label">Level</label>
                        <!-- <input class="form-control mb-4" type="text" value="Petugas" aria-label="Disabled input example" name="levell" readonly> -->
                        <select class="form-select mb-4" aria-label="Default select example" name="levell">
                            <option value="Petugas">Petugas</option>
                            <option value="Administrator">Administrator</option>
                        </select>

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
                            <a href="../petugas.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4 py-2 text-white">Tambah</button>
                        </div>

                    </div>

                    <!-- KOLOM KANAN, UNTUK MENGUBAH FOTO PROFIL -->
                    <div class="right col">
                        <img src="../assets/img/anggota/user.png" alt="Profil Default" class="w-50 d-block mx-auto mt-4" id="profil">
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

    <!-- Toast Create -->
    <?php if (isset($_SESSION['createFail']) == "fail") : ?>
        <div class="toast-container position-absolute bottom-0 end-0 p-4" id="toastPlacement">
            <div class="toast">
                <div class="d-flex bg-danger text-white p-2 rounded">
                    <div class="toast-body">
                        <i class="fas fa-times-circle fa-lg"></i>
                        <strong class="fs-6">Gagal Menambahkan</strong>
                        <p class="mb-0 ms-4 mt-1">Username tidak boleh sama!</p>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['createFail']); ?>

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
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

        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            // Creates an array of toasts (it only initializes them)
            return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
        toastList.forEach(toast => toast.show()); // This show them
    </script>
</body>

</html>