<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/util.css">

    <title>Buku | Tambah Data</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php require '../layout.php'; ?>

    <!-- CONTENT MENAMBAH DATA Buku -->
    <section class="px-4">

        <a href="../buku.php" class="text-secondary my-4 fs-14 d-block text-decoration-none">
            <i class="fas fa-arrow-circle-left me-1"></i> Kembali
        </a>

        <h4 class="fw-bold text-green my-4">
            Menambah Data Buku <i class="fas fa-book fa-sm"></i>
        </h4>

        <div class="card p-4">
            <form action="create-buku.php" method="POST" enctype="multipart/form-data">

                <div class="d-flex gap-5">

                    <div class="left col-7">

                        <!-- INPUT JUDUL BUKU -->
                        <label for="judul" class="text-green fw-600 form-label">Judul Buku</label>
                        <input type="text" class="form-control mb-4" id="judul" placeholder="Contoh : Filosofi Teras" name="judul" required>

                        <!-- INPUT PENGARANG -->
                        <label for="pengarang" class="text-green fw-600 form-label">Pengarang</label>
                        <input type="text" class="form-control mb-4" id="pengarang" placeholder="Contoh : Henry Manampiring" name="pengarang" required>

                        <div class="d-flex justify-content-end mt-4 gap-3">
                            <a href="../buku.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4 py-2 text-white">Tambah</button>
                        </div>

                    </div>

                    <!-- KOLOM KANAN, UNTUK MENGUBAH SAMPUL BUKU -->
                    <div class="right col">
                        <img src="../assets/img/buku/sampul-default.png" alt="Sampul Default" class="w-50 d-block mx-auto" id="sampul">
                        <p class="text-center py-2 mb-1">Sampul Buku</p>

                        <label for="foto" class="form-label fw-bold">
                            Ganti Sampul
                            <i class="fas fa-level-down-alt fa-sm"></i>
                        </label>

                        <input class="form-control" type="file" id="input-foto" onchange="previewImg(this)" name="sampul">

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
                    $("#sampul").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>