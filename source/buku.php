<?php

include_once 'buku/read-buku.php';

$data = readBuku();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/util.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <title>Kelola Data Buku</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once 'layout.php'; ?>

    <!-- CONTENT KELOLA ANGGOTA -->
    <section class="kelola-buku px-4 mb-5">

        <p class="text-secondary my-4 fs-14">
            Kelola Data <i class="fas fa-angle-right"></i> Buku
        </p>

        <h4 class="fw-bold text-green my-4">
            Data Buku

            <!-- BUTTON TAMBAH -->
            <a href="buku/buku-tambah.php" class="btn btn-primary btn-sm ms-1">
                <i class="fas fa-plus"></i>
                Tambah
            </a>
        </h4>

        <div class="col-12">
            <table class="table table-bordered table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">ID Buku</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $buku) : ?>
                        <tr>
                            <!-- <input type="hidden" name="id" value="<?= $buku[0]; ?>"> -->
                            <td><?= $no; ?></td>
                            <td>
                                <img src="assets/img/buku/<?= $buku['gambar']; ?>" alt="" width="40%" class="d-block mx-auto">
                            </td>
                            <td><?= $buku['id']; ?></td>
                            <td><?= $buku['judul']; ?></td>
                            <td><?= $buku['pengarang']; ?></td>
                            <td>
                                <button class="badge bg-danger border-0 btn-hapus" data-bs-toggle="modal" data-bs-target="#confirmDelete" onclick='confirm("<?= $buku["judul"]; ?>", "<?= $buku["id"]; ?>", "<?= $buku["gambar"]; ?>")'>
                                    Hapus
                                </button>
                                <a href="buku/buku-edit.php?id=<?= $buku["id"]; ?>" class="badge bg-warning text-decoration-none mx-1">
                                    Edit
                                </a>
                                <a href="buku/buku-detail.php?id=<?= $buku["id"]; ?>" class="badge bg-info text-decoration-none">Detail</a>
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
                                <span class="fw-bold col-3">ID Buku</span>
                                <div class="fw-bold col-1">:</div>
                                <span class="idDel col"></span><br>
                            </div>

                            <div class="row">
                                <span class="fw-bold col-3">Judul</span>
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

    <!-- Toast Create -->
    <?php if (isset($_SESSION['create']) == true) : ?>
        <div class="toast-container position-absolute bottom-0 end-0 p-4" id="toastPlacement">
            <div class="toast">
                <div class="d-flex bg-success text-white p-2 rounded">
                    <div class="toast-body">
                        <i class="fas fa-check-circle fa-lg"></i>
                        <strong class="fs-6">Berhasil</strong>
                        <p class="mb-0 ms-4 mt-1">Menambahkan Data Buku</p>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <!-- Toast Update -->
    <?php elseif (isset($_SESSION['update']) == true) : ?>
        <div class="toast-container position-absolute bottom-0 end-0 p-4" id="toastPlacement">
            <div class="toast">
                <div class="d-flex bg-success text-white p-2 rounded">
                    <div class="toast-body">
                        <i class="fas fa-check-circle fa-lg"></i>
                        <strong class="fs-6">Berhasil</strong>
                        <p class="mb-0 ms-4 mt-1">Mengubah Data Buku</p>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <!-- Toast Delete -->
    <?php elseif (isset($_SESSION['delete']) == true) : ?>
        <div class="toast-container position-absolute bottom-0 end-0 p-4" id="toastPlacement">
            <div class="toast">
                <div class="d-flex bg-success text-white p-2 rounded">
                    <div class="toast-body">
                        <i class="fas fa-check-circle fa-lg"></i>
                        <strong class="fs-6">Berhasil</strong>
                        <p class="mb-0 ms-4 mt-1">Menghapus Data Buku</p>
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
                        <strong class="fs-6">Gagal Menghapus</strong>
                        <p class="mb-0 ms-4 mt-1">Buku sedang peminjaman</p>
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
            $('.gambar-del').attr('src', `assets/img/buku/${gambar}`);
            // MENDIRECT KE delete-buku agar dapat menghapus data buku
            $('.btn-delete').attr('href', `buku/delete-buku.php?id=${id}`);
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