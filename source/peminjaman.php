<?php

include_once 'peminjaman/read-peminjaman.php';

$data = readPeminjaman();

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

    <title>Peminjaman</title>
</head>

<body>

    <!-- MEMASUKAN LAYOUT -->
    <?php include_once 'layout.php'; ?>

    <!-- CONTENT PEMINJAMAN BUKU -->
    <section class="kelola-anggota px-4 mb-5">

        <p class="text-secondary my-4 fs-14">
            Sirkulasi <i class="fas fa-angle-right"></i> Peminjaman Buku
        </p>

        <h4 class="text-green fw-bold my-4">
            Peminjaman Buku

            <!-- BUTTON TAMBAH -->
            <a href="peminjaman/peminjaman-tambah.php" class="btn btn-primary btn-sm ms-1">
                <i class="fas fa-plus"></i>
                Tambah
            </a>
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
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $peminjaman) : ?>
                        <tr>
                            <!-- <input type="hidden" name="id" value="<?= $peminjaman[0]; ?>"> -->
                            <td><?= $no; ?></td>
                            <td>
                                <?= $peminjaman['nama']; ?>
                            </td>
                            <td><?= $peminjaman['judul']; ?></td>
                            <td><?= $peminjaman['tgl_pinjam']; ?></td>
                            <td><?= $peminjaman['tgl_kembali']; ?></td>
                            <td>
                                <span class="badge bg-secondary">Pinjam</span>
                                <?php if (terlambat($peminjaman['id'], "%R") > 0) : ?>
                                    <p class="fs-12 fst-italic text-danger mb-0">
                                        Terlambat : <?= terlambat($peminjaman['id'], "%R"); ?> hari
                                    </p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <!-- <button class="fs-12 text-secondary text-decoration-none fw-600 mx-1 p-1 text-hover" data-bs-toggle="modal" data-bs-target="#confirmPerpanjang" onclick='confirm("<?= $peminjaman["id"]; ?>", "<?= $peminjaman["nama"]; ?>", "<?= $peminjaman["judul"]; ?>", "<?= $peminjaman["tgl_kembali"]; ?>")'>
                                    Perpanjang
                                </button> -->
                                <a href="peminjaman/update-peminjaman.php?id=<?= $peminjaman['id']; ?>" class="fs-12 text-secondary text-decoration-none fw-600 p-1 text-hover">Perpanjang</a>
                                <a href="peminjaman/delete-peminjaman.php?id=<?= $peminjaman['id']; ?>" class="fs-12 text-secondary border-start border-end text-decoration-none fw-600 mb-2 py-1 px-2 text-hover">Selesai</a>
                                <a href="peminjaman/peminjaman-detail.php?id=<?= $peminjaman['id']; ?>" class="fs-12 text-secondary text-decoration-none fw-600 p-1 text-hover">Detail</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>

    </section>

    <!-- MODAL PERPANJANG BUKU, UNTUK MENGKONFIRMASI APAKAH INGIN PERPANJANG PEMINJAMAN -->
    <div class="modal faded" id="confirmPerpanjang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-exclamation-circle fa-lg text-danger"></i>
                        Perpanjang pinjaman
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex align-items-center gap-1">
                        <div class="d-flex flex-column flex-grow-1">
                            <!-- ROW NAMA -->
                            <div class="row mb-1">
                                <span class="fw-bold col-3">Nama</span>
                                <div class="fw-bold col-1">:</div>
                                <span class="nama col"></span><br>
                            </div>

                            <!-- ROW JUDUL -->
                            <div class="row">
                                <span class="fw-bold col-3">Judul Buku</span>
                                <div class="fw-bold col-1">:</div>
                                <span class="judul col"></span><br>
                            </div>

                            <!-- ROW PERPANJANG -->
                            <div class="row mt-3">
                                <span class="fw-bold col-3">Perpanjang</span>
                                <div class="row ms-3 mt-2">
                                    <span class="fw-bold fs-14 col-2">Dari</span>
                                    <span class="fw-bold col-1 ms-3"> : </span>
                                    <span class="fw-bold col tgl_kembali"></span>
                                </div>
                                <div class="row ms-3 mt-2">
                                    <span class="fw-bold fs-14 col-2">Menjadi</span>
                                    <span class="fw-bold col-1 ms-3"> : </span>
                                    <span class="fw-bold col tgl_perpanjang"></span>
                                </div>
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
                        <p class="mb-0 ms-4 mt-1">Menambahkan data</p>
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
                        <p class="mb-0 ms-4 mt-1">Memperpanjang Pinjaman (+7 hari)</p>
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
                        <p class="mb-0 ms-4 mt-1">Mengembalikan buku</p>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['createFail']) == "fail") : ?>
        <div class="toast-container position-absolute bottom-0 end-0 p-4" id="toastPlacement">
            <div class="toast">
                <div class="d-flex bg-danger text-white p-2 rounded">
                    <div class="toast-body">
                        <i class="fas fa-times-circle fa-lg"></i>
                        <strong class="fs-6">Gagal Menambahkan Data</strong>
                        <p class="mb-0 ms-4 mt-1">Anggota tidak terdaftar</p>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['create'], $_SESSION['update'], $_SESSION['delete'], $_SESSION['createFail']); ?>

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
                    },
                    {
                        "width": "20%",
                        "targets": 6
                    },
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