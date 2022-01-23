<?php

include_once 'pengembalian/read-pengembalian.php';

$data = readPengembalian();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/peminjaman.css">
    <link rel="stylesheet" href="assets/css/util.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <title>Pengembalian</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once 'layout.php'; ?>

    <!-- CONTENT PENGEMBALIAN BUKU -->
    <section class="kelola-anggota px-4 mb-5">

        <p class="text-secondary my-4 fs-14">
            Sirkulasi <i class="fas fa-angle-right"></i> Pengembalian Buku
        </p>

        <h4 class="fw-bold text-green my-4">
            Pengembalian Buku
            <i class="fas fa-reply fa-sm"></i>
        </h4>

        <div class="col-12">
            <table class="table table-bordered table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $pengembalian) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>
                                <?= $pengembalian['nama']; ?>
                            </td>
                            <td><?= $pengembalian['judul']; ?></td>
                            <td><?= $pengembalian['tgl_pinjam']; ?></td>
                            <td><?= $pengembalian['tgl_kembali']; ?></td>
                            <td>
                                <a href="pengembalian/delete-pengembalian.php?id=<?= $pengembalian['id']; ?>" class="badge bg-danger  text-decoration-none">Hapus</a>
                                <a href="pengembalian/pengembalian-detail.php?id=<?= $pengembalian['id']; ?>" class="badge bg-info  text-decoration-none">Detail</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>

    </section>

    <!-- Toast Delete -->
    <?php if (isset($_SESSION['delete']) == true) : ?>
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
                        "width": "15%",
                        "targets": 1
                    },
                    {
                        "width": "15%",
                        "targets": 2
                    },
                    {
                        "width": "15%",
                        "targets": 3
                    },
                    {
                        "width": "15%",
                        "targets": 4
                    },
                    {
                        "width": "10%",
                        "targets": 5
                    }
                ],
                autoWidth: false
            });

        });

        // FUNCTION UNTUK KONFIRMASI APAKAH INGIN DELETE DATA ANGGOTA
        function confirm(id, nama, judul, tglKembali) {
            $('.nama').text(nama);
            $('.judul').text(judul);
            $('.tgl_kembali').text(tglKembali)
            $('.tgl_perpanjang').attr('href', `anggota/delete-anggota.php?id=${id}`);
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