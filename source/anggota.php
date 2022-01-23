<?php

include_once 'anggota/read-anggota.php';

$data = readAnggota();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/anggota.css">
    <link rel="stylesheet" href="assets/css/util.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <title>Kelola Data Anggota</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once 'layout.php'; ?>

    <!-- CONTENT KELOLA ANGGOTA -->
    <section class="kelola-anggota px-4 pt-4 mb-5">

        <p class="text-secondary mb-4 fs-14">
            Kelola Data <i class="fas fa-angle-right"></i> Anggota
        </p>

        <h4 class="fw-bold my-4 text-green">
            Data Anggota

            <!-- BUTTON TAMBAH -->
            <a href="anggota/anggota-tambah.php" class="btn btn-primary btn-sm ms-1">
                <i class="fas fa-user-plus"></i>
                Tambah
            </a>
        </h4>

        <div class="col-12">
            <table class="table table-bordered table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Id Anggota</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $anggota) : ?>
                        <tr>
                            <!-- <input type="hidden" name="id" value="<?= $anggota[0]; ?>"> -->
                            <td><?= $no; ?></td>
                            <td>
                                <img src="assets/img/anggota/<?= $anggota['image']; ?>" alt="" width="40%" class="d-block mx-auto">
                            </td>
                            <td><?= $anggota['id']; ?></td>
                            <td><?= $anggota['nama']; ?></td>
                            <td><?= $anggota['jk']; ?></td>
                            <td>
                                <button class="badge bg-danger border-0 btn-hapus" data-bs-toggle="modal" data-bs-target="#confirmDelete" onclick='confirm("<?= $anggota["nama"]; ?>", <?= $anggota["id"]; ?>, "<?= $anggota["image"]; ?>")'>
                                    Hapus
                                </button>
                                <a href="anggota/anggota-edit.php?id=<?= $anggota['id']; ?>" class="badge bg-warning text-decoration-none mx-1">
                                    Edit
                                </a>
                                <a href="anggota/anggota-detail.php?id=<?= $anggota['id']; ?>" class="badge bg-info text-decoration-none">Detail</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>

    </section>

    <!-- MODAL DELETE, UNTUK MENGKONFIRMASI APAKAH USER INGIN MENGHAPUS DATA -->
    <div class="modal faded" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-exclamation-circle fa-lg text-danger"></i>
                        Anda yakin ingin menghapus?
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex align-items-center gap-1">
                        <div class="col-3">
                            <img src="" alt="" class="gambar-del w-75">
                        </div>
                        <div class="d-flex flex-column flex-grow-1">
                            <div class="row mb-1">
                                <span class="fw-bold col-3">ID</span>
                                <div class="fw-bold col-1">:</div>
                                <span class="idDel col"></span><br>
                            </div>

                            <div class="row">
                                <span class="fw-bold col-3">Nama</span>
                                <div class="fw-bold col-1">:</div>
                                <span class="nameDel col"></span><br>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="" type="button" class="btn btn-danger btn-delete">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menampilkan toast atau notifikasi jika berhasil Menambahkan data, Mengedit data atau Menghapus data -->
    <?php if (isset($_SESSION['create']) || isset($_SESSION['update']) || isset($_SESSION['delete'])) : ?>
        <div class="toast-container position-absolute bottom-0 end-0 p-4" id="toastPlacement">
            <div class="toast">
                <div class="d-flex bg-success text-white p-2 rounded">
                    <div class="toast-body">

                        <!-- Toast Create -->
                        <?php if (isset($_SESSION['create']) == true) : ?>
                            <i class="fas fa-check-circle fa-lg"></i>
                            <strong class="fs-6">Berhasil</strong>
                            <p class="mb-0 ms-4 mt-1">Menambahkan Data</p>

                            <!-- Toast Update -->
                        <?php elseif (isset($_SESSION['update']) == true) : ?>
                            <i class="fas fa-check-circle fa-lg"></i>
                            <strong class="fs-6">Berhasil</strong>
                            <p class="mb-0 ms-4 mt-1">Mengubah Data</p>

                            <!-- Toast Delete -->
                        <?php elseif (isset($_SESSION['delete']) == "success") : ?>
                            <i class="fas fa-check-circle fa-lg"></i>
                            <strong class="fs-6">Berhasil</strong>
                            <p class="mb-0 ms-4 mt-1">Menghapus Data</p>

                        <?php endif; ?>

                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['deleteFalse']) == "failed") : ?>
        <div class="toast-container position-absolute bottom-0 end-0 p-4" id="toastPlacement">
            <div class="toast">
                <div class="d-flex bg-danger text-white p-2 rounded">
                    <div class="toast-body">
                        <i class="fas fa-times-circle fa-lg"></i>
                        <strong class="fs-6">Gagal Menghapus Data</strong>
                        <p class="mb-0 ms-4 mt-1">Anggota masih meminjam buku</p>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['create'], $_SESSION['update'], $_SESSION['delete'], $_SESSION['deleteFalse']) ?>


    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#example').DataTable({
                "columnDefs": [{
                        "width": "5%",
                        "targets": 0
                    },
                    {
                        "width": "10%",
                        "targets": 1
                    },
                    {
                        "width": "15%",
                        "targets": 2
                    },
                    {
                        "width": "20%",
                        "targets": 3
                    },
                    {
                        "width": "15%",
                        "targets": 4
                    },
                    {
                        "width": "20%",
                        "targets": 5
                    },
                ],
                autoWidth: false
            });

        });

        // FUNCTION UNTUK KONFIRMASI APAKAH INGIN DELETE DATA ANGGOTA
        function confirm(nama, id, gambar) {
            $('.idDel').text(id);
            $('.nameDel').text(nama);
            $('.gambar-del').attr('src', `assets/img/anggota/${gambar}`);
            $('.btn-delete').attr('href', `anggota/delete-anggota.php?id=${id}`);
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